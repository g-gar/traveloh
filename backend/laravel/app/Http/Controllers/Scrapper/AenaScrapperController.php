<?php 
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Airport;
use App\Model\Aena;
use App\Model\TuTiempo;

/**
 * Scrapes aena.es
 * 
 * @param airport
 * @return void
 * 
 */

class AenaScrapperController extends ScrapperController implements FlightScrapperController
{
	private static $airport;

	public static function generateCommands($airport_code){
		$commands = [];
		self::$airport = Airport::where('code', $airport_code)->firstOrFail();
    
        $commands[self::$airport->id] = PathsController::get_python_executable() . ' ';
        $commands[self::$airport->id] .= realpath(PathsController::get_python_path() . '/src/scrappers/aena.es.py') . ' --url ';
		$commands[self::$airport->id] .= "\"http://www.aena.es/csee/Satellite/infovuelos/es/?origin_ac=$airport_code&mov=S\"";

		return $commands;
	}

	public static function consume_json($json) {
		try {
			date_default_timezone_set("Europe/Madrid");
			echo $json;
			foreach (json_decode($json, true) as $key => $value) {
				
				//TODO: search arline
				$airline_name = $value['company'];
				$airline = Airport::where(['airports.code' => self::$airport->code])
					->join('airport_airlines', 'airport_airlines.id_airport', '=', 'airports.id')
					->join('airlines', function ($join) use ($airline_name) {
						$join->on('airlines.id', '=', 'airport_airlines.id_airline')
							->where('airlines.aena_name', '=', $airline_name);
					})
					->select('airlines.*')
					->limit(1)
					->get()
					->first();

				$hour = AenaScrapperController::hour2mins($value['hour']);
				$arr = TuTiempo::whereDate('timestamp', '>=', date("H:i"))
					->get()
					->toArray();
				usort($arr, function($a, $b) {
					return self::hour2mins($a['hour']) > self::hour2mins($b['hour']) ? -1 : 1;
				});
				$tiempo = !!count($arr) ? $arr[0] : null;

				if (!Aena::where('flight_code', '=', $value['flight_code'])->first()) {
					$id = DB::table('data')->insertGetId([
						'identifier' => 'aena',
						'source' => 'aena.es'
					]);
					DB::table('flight_data')->insert([
						'id' => $id,
						'id_weather_data' => !!$tiempo ? $tiempo['id'] : -1,
						'id_airline' => !!$airline ? $airline->id : -1
					]);
					DB::table('aena')->insert([
						'id' => $id,
						'hour' => $value['hour'],
						'flight_code' => $value['flight_code'],
						'destination' => $value['destination'],
						'company' => $value['company'],
						'terminal' => $value['terminal'],
						'date' => date("Y-m-d")
					]);
				}

				//TODO: get weather data
			}
		} catch (\Throwable $th) {
			throw $th;
		}
	}

	/**
	 * Executes the aena scrapper
	 * @urlParam airport-code required The airport code. Example: MAD
	 */
	public static function init($args) {
		$result = null;
		$commands = self::generateCommands($args);
        foreach (CommandController::execute($commands) as $key => $json) {
            $result = json_decode($json, true);
            self::consume_json($json);
        }
        return $result;
	}

	public static function scrapWeatherData($airport){
		return null;
	}

	public static function hour2mins($hour) {
		$temp = explode(":", $hour);
		return intval($temp[0]) * 60 + intval($temp[1]);
	}
}