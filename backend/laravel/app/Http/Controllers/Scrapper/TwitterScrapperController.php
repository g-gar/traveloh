<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TwitterScrapperController extends ScrapperController
{
    public static function generateCommands($airport_code){
		$commands = [];
		 $locations = DB::table('airports')->where('code', $airport_code)->pluck('location', 'location');
		foreach ($locations as $location => $airport) {
			$commands[$location] = PathsController::get_python_executable() . ' ';
			$commands[$location] .= realpath(PathsController::get_python_path() . '/src/scrappers/twitter.com.py') . ' --url ';
			$commands[$location] .= "https://twitter.com/search?q=coronavirus&src=typed_query";
		} 
		return $commands;
	}

	public static function consume_json($json) {
		foreach (json_decode($json, true) as $key => $json) {
			try {
				foreach ($json as $key => $value) {
				$id = DB::table('data')->insertGetId([
						'identifier' => 'twitter',
						'source' => 'twitter.com'
					]);
					DB::table('twitter')->insert([
						'id' => $id,
						'id_twitter' => $value['id_twitter']
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
