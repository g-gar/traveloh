<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlightsController extends Controller
{
    /**
	 * Returns all flights complete information
	 */
    public static function getFlightsInfo() {
        return array_map(function($flight){
            return self::getFlightInfo($flight->flight_code);
        }, DB::table('flight_data')->join('aena', 'aena.id', '=', 'flight_data.id')->get()->toArray());
    }

    /**
	 * Returns any flight complete information
     * @urlParam code required The flight code. Example: BAW1513
	 */
    public static function getFlightInfo($code) {
        return DB::table('flight_data')
            ->join('aena', 'aena.id', '=', 'flight_data.id')
            ->join('weather_data', 'flight_data', '=', 'weather_data.id')
            ->join('tutiempo', 'tutiempo.id', '=', 'weather_data.id')
            ->having('flight_data.code', $code)
            ->firstOrFail();
    }
}
