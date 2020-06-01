<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AirportsController;
use App\Http\Controllers\AenaScrapperController;
use App\Http\Controllers\TuTiempoScrapperController;

use App\Http\Controllers\TripAdvisorScrapperController;
use App\Http\Controllers\TripAdvisorSentimentController;

class ExecScrappers extends Controller
{

    public static function init() {
/*          $codes = array();
        $var1 = app('App\Http\Controllers\AirportsController')->getAirports();

        foreach ($var1 as $var) {

        array_push($codes, $var->code);

        }

        foreach ($codes as $code) {
            $var3 = app('App\Http\Controllers\TuTiempoScrapperController')->init($code);
            $var2 = app('App\Http\Controllers\AenaScrapperController')->init($code);


        } */

        set_time_limit(3600);
        foreach (AirportsController::getAirports() as $airport) {
            TuTiempoScrapperController::init($airport->code);
            AenaScrapperController::init($airport->code);

            foreach (AirportsController::getAirlines($airport->code) as $airline) {
                TripAdvisorScrapperController::init($airline->tripadvisor_code);
                TripAdvisorSentimentController::init($airline->tripadvisor_code);
            }
        }

    }
}
