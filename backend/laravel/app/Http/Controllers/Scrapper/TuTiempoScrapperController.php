<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\TuTiempo;

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
				$id = DB::table('data')->insertGetId([
					'identifier' => 'tutiempo',
					'source' => 'tutiempo.net'
				]);
				DB::table('weather_data')->insert([
					'id' => $id
				]);

				$results = TuTiempo::where([
					'hour' => $json['hour'],
					'timestamp' => date("Y-m-d")
				])->get();
				foreach ($results as $result) {
					$result->delete();
				}
				DB::table('tutiempo')->insert([
					'id' => $id,
					'weather' => $json['weather'],
					'hour' => $json['hour'],
					'temperature' => $json['temperature'],
					'wind' => $json['wind'],
					'humidity' => $json['humidity'],
					'atmospheric_pressure' => $json['atmospheric_pressure'],
					'timestamp' => date("Y-m-d")
				]);
			} catch (\Throwable $th) {
				throw $th;
			}
		}
	}

	/**
	 * Executes the TuTiempo scrapper
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
}
