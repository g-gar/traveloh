<?php 
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Scrapes aena.es
 * 
 * @param airport
 * @return void
 * 
 */

class AenaScrapperController extends ScrapperController
{

	public static function generateCommands($airport_code){
		$commands = [];
		$locations = DB::table('airports')->where('code', $airport_code)->first();
    
        $commands[$location] = PathsController::get_python_executable() . ' ';
        $commands[$location] .= realpath(PathsController::get_python_path() . '/src/scrappers/aena.es.py') . ' --url ';
        $commands[$location] .= "http://www.aena.es/csee/Satellite/infovuelos/es/?origin_ac=$airport_code&mov=S";
    
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