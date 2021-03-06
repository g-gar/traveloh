<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TripAdvisorScrapperController extends ScrapperController
{
	private static $airline;

    public static function generateCommands($tripadvisor_code){
        $commands = [];
        self::$airline = DB::table('airlines')->where('tripadvisor_code', $tripadvisor_code)->get()->first();
        var_dump(self::$airline);
        $name = self::$airline->tripadvisor_name;

        $commands[$tripadvisor_code] = PathsController::get_python_executable() . ' ';
        $commands[$tripadvisor_code] .= realpath(PathsController::get_python_path() . '/src/scrappers/tripadvisor.es.py') . ' --url ';
        $commands[$tripadvisor_code] .= "https://www.tripadvisor.es/Airline_Review-d$tripadvisor_code-Reviews-$name";

		return $commands;
	}

	public static function consume_json($json) {

		foreach (json_decode($json, true) as $key => $json) {
			try {
				$id = DB::table('data')->insertGetId([
					'identifier' => 'tripadvisor',
					'source' => 'tripadvisor.es'
				]);
				DB::table('sentiment_analysis_data')->insert([
					'id' => $id,
					'positive' => null,
					'negative' => null,
					'neutral' => null,
					'compound' => null,
					'text' => "\"".$json['text']."\"",
					'id_airline' => self::$airline->id
				]);
				DB::table('tripadvisor')->insert([
					'id' => $id,
					'language' => $json['language'],
					'title' => $json['title'],
					'id_opinion' => $json['reviewId']
				]);
			} catch (\Throwable $th) {
				throw $th;
			}
		}
	}

	/**
	 * Executes the TripAdvisor scrapper
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
		$result = null;
        $commands = self::generateCommands($args);
        foreach (CommandController::execute($commands) as $key => $json) {
            $result = json_decode($json, true);
            self::consume_json($json);
        }
        return $result;
	}
}
