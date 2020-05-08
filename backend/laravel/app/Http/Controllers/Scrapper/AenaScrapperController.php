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

class AenaScrapperController extends ScrapperController
{

	public static function generateCommands($airport_code){
		$commands = [];
		$aircod = Airport::where('code', $airport_code)->firstOrFail();
    
        $commands[$aircod->id] = PathsController::get_python_executable() . ' ';
        $commands[$aircod->id] .= realpath(PathsController::get_python_path() . '/src/scrappers/aena.es.py') . ' --url ';
		$commands[$aircod->id] .= "\"http://www.aena.es/csee/Satellite/infovuelos/es/?origin_ac=$airport_code&mov=S\"";
		echo($commands[$aircod->id]);
		return $commands;
	}

	public static function consume_json($json) {
		var_dump($json);
		try {
			foreach (json_decode($json, true) as $key => $value) {
				$id = DB::table('data')->insertGetId([
					'identifier' => 'aena',
					'source' => 'aena.es'
				]);
				DB::table('flight_data')->insert([
					'id' => $id
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

	public static function init($args) {
		$result = [];
		$commands = self::generateCommands($args);
		var_dump($commands);
        foreach (CommandController::execute($commands) as $key => $json) {
            array_push($result, $json);
            self::consume_json($json);
        }
        return $result;
	}
}