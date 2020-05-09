<?php 
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Airport;

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
			foreach (json_decode($json, true) as $key => $value) {
				$id = DB::table('data')->insertGetId([
					'identifier' => 'aena',
					'source' => 'aena.es'
				]);
				//TODO: search arline
				//TODO: get weather data
				DB::table('flight_data')->insert([
					'id' => $id,
					'id_weather_data' => -1,
					'id_airline' => -1
				]);
				DB::table('aena')->insert([
					'id' => $id,
					'hour' => $value['hour'],
					'flight_code' => $value['flight_code'],
					'destination' => $value['destination'],
					'company' => $value['company'],
					'terminal' => $value['terminal']
				]);
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
		$result = [];
		$commands = self::generateCommands($args);
        foreach (CommandController::execute($commands) as $key => $json) {
            array_push($result, $json);
            self::consume_json($json);
        }
        return $result;
	}

	public static function scrapWeatherData($airport){
		return null;
	}
}