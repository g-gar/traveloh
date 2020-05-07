<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TuTiempoScrapperController extends ScrapperController
{

    public static function generateCommands($args){
        $commands = [];
        $airport = $args[0];
        $locations = DB::table('airports')->where('name', $airport)->pluck('location', 'location');
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
}
