<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScrapperController extends Controller
{

    public static function execute($scrapper) {
        $python_path = dirname(base_path(), $levels = 1) . '/python';
        $result = null;
        $command = null;

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $command = "$python_path/Scripts/python.exe";
        } else {
            $command = "$python_path/bin/python";
        }

        try {
            $command .= " $python_path/src/scrappers/$scrapper.py --url ";
            foreach (ScrapperController::base_urls($scrapper, array_slice(func_get_args(), 1)) as $key => $value) {
                $json = shell_exec($command . $value);
                ScrapperController::consume_json($scrapper, $json);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function base_urls($scrapper, $args) {
        $result = "";

        switch ($scrapper) {
            case "tutiempo.net":
                $result = ScrapperController::tutiempo_net_urls($args);
                break;
        }
        return $result;
    }

    public static function consume_json($scrapper, $json) {
        $temp = json_decode($json, true);
        switch ($scrapper) {
            case "tutiempo.net":
                ScrapperController::tutiempo_net_consume_json($temp);
                break;
        }
    }

    public static function tutiempo_net_urls($args) {
        $results = [];
        $airport = $args[0];
        $locations = DB::table('airports')->where('name', $airport)->pluck('location', 'location');
        foreach ($locations as $location => $airport) {
            $results[$location] = "https://www.tutiempo.net/$location.html?datos=ultimas-24-horas";
        }
        return $results;
    }

    public static function tutiempo_net_consume_json($list) {
        foreach ($list as $key => $json) {
            try {
                foreach ($json as $key => $json) {
                    $id = DB::table('data')->insertGetId([
                        'identifier' => 'tutiempo',
                        'source' => 'tutiempo.net'
                    ]);
                    DB::table('weather_data')->insert([
                        'id' => $id
                    ]);
                    DB::table('tu_tiempo')->insert([
                        'id' => $id,
                        'weather' => $json['weather'],
                        'hour' => $json['hour'],
                        'temperature' => $json['temperature'],
                        'wind' => $json['wind'],
                        'humidity' => $json['humidity'],
                        'atmospheric_pressure' => $json['atmospheric_pressure'],
                        'timestamp' => now()
                    ]);
                }
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }

    public static function aena_es($args) {
        return "";
    }
}
