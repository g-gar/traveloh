<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Scrapes tutiempo.net
 * 
 * @param airport
 * @return void
 * 
 */

class TuTiempoScrapperController extends ScrapperController
{

	public static function generateCommands($airport_code){
		$commands = [];
		$locations = DB::table('airports')->where('code', $airport_code)->pluck('location', 'location');
		foreach ($locations as $location => $airport) {
			$commands[$location] = PathsController::get_python_executable() . ' ';
			$commands[$location] .= realpath(PathsController::get_python_path() . '/src/scrappers/tutiempo.net.py') . ' --url ';
			$commands[$location] .= "https://www.tutiempo.net/$location.html?datos=ultimas-24-horas";
		}
		return $commands;
	}

	public static function consume_json($json) {
		foreach (json_decode($json, true) as $key => $json) {
			try {
				foreach ($json as $key => $value) {
					$id = DB::table('data')->insertGetId([
						'identifier' => 'tutiempo',
						'source' => 'tutiempo.net'
					]);
					DB::table('weather_data')->insert([
						'id' => $id
					]);
					DB::table('tu_tiempo')->insert([
						'id' => $id,
						'weather' => $value['weather'],
						'hour' => $value['hour'],
						'temperature' => $value['temperature'],
						'wind' => $value['wind'],
						'humidity' => $value['humidity'],
						'atmospheric_pressure' => $value['atmospheric_pressure'],
						'timestamp' => now()
					]);
				}
			} catch (\Throwable $th) {
				throw $th;
			}
		}
	}

	/**
	 * @urlParam airport-code required The airport code. Example: MAD
	 * @response {
	 * 	"results": [{
	 * 		"hour": "12:00",
	 *		"weather": "Despejado",
			"temperature": 25,
			"wind": 26,
			"humidity": 0.39,
			"atmospheric-pressure": 1016
	 * }]
	 * }
	 * @response 404 {
	 * 	"message": "airport [lmfao] not supported"
	 * }
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
}
