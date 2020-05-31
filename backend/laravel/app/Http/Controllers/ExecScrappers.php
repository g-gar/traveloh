<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AirportsController;
use App\Http\Controllers\AenaScrapperController;

class ExecScrappers extends Controller
{
    
    public static function init() {
         $codes = array();
        $var1 = app('App\Http\Controllers\AirportsController')->getAirports();
        
        foreach ($var1 as $var) {

        array_push($codes, $var->code);
        
        }
        
        foreach ($codes as $code) {
            $var2 = app('App\Http\Controllers\AenaScrapperController')->init($code);
            //$var3 = app('App\Http\Controllers\TuTiempoScrapperController')->init($code);
        }
        

        /*
        foreach (AirportsController::getAirports() as $airport) {
            AenaScrapperController::init($airport->code);
            echo "[DONE] $airport->code";
        }
        */
    }
}
