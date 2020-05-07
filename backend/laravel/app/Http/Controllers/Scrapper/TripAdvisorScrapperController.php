<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TripAdvisorScrapperController extends ScrapperController
{
    public static function generateCommands($airline_code){
		$commands = [];
		$airline = DB::table('airlines')->where('tripadvisor_code', $airline_code)->first();
        $name = $airline->tripadvisor_name;
        
        $commands[$airline_code] = PathsController::get_python_executable() . ' ';
        $commands[$airline_code] .= realpath(PathsController::get_python_path() . '/src/scrappers/tripadvisor.com.py') . ' --url ';
        $commands[$airline_code] .= "https://www.tripadvisor.es/Airline_Review-d$airline_code-Reviews-$name";

		return $commands;
	}

	public static function consume_json($json) {
		foreach (json_decode($json, true) as $key => $json) {
			try {
				foreach ($json as $key => $value) {
                    $r = "";
					$id = DB::table('data')->insertGetId([
						'identifier' => 'tripadvisor',
						'source' => 'tripadvisor.es'
					]);
					DB::table('sentiment_analysis_data')->insert([
                        'id' => $id,
                        'positive' => $r['positive'],
                        'negative' => $r['negative'],
                        'neutral' => $r['neutral'],
                        'compound' => $r['compound'],
                        'text' => $json['text']
					]);
					DB::table('tu_tiempo')->insert([
						'id' => $id,
                        'language' => $json['language'],
                        'title' => $json['title'],
                        'id_opinion' => $json['reviewId']
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
            //self::consume_json($json);
        }
        return $result;
	}
}
