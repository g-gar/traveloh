<?php

namespace App\Http\Controllers;

use App\Model\Airline;
use App\Model\Airport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AirportsController extends Controller
{
    /**
	 * Returns the airports ranked by rating
	 */
    public static function rank() {
        $results = [];
        foreach (Airport::all() as $airport) {
            $results[$airport->id] = self::compound($airport);
        }
        return $results;
    }

    public static function compound($airport) {
        $result = 0.0;
        try {
            $airlines = self::getAirlines($airport);
            $result = array_reduce($airlines, function($accumulator, $airline) {
                return $accumulator + AirlinesController::compound($airline);
            }, 0.0) / count($airlines);
        } catch (\Throwable $th) {}
        return $result;
    }

    /**
	 * Returns all airport complete information
	 */
    public static function getAirportsInfo(){
        $result = [];
        foreach (Airport::all() as $airport) {
            $result[$airport->id] = self::getAirportInfo($airport->code);
        }
        return $result;
    }

    /**
	 * Returns an airport complete information
     * @urlParam airport required The airport code. Example: MAD
	 */
    public static function getAirportInfo($code) {
        $airport = Airport::where('code', '=', $code)->firstOrFail();
        $result['airport'] = $airport;
        $result['airlines'] = array_map(function($airline){
            return AirlinesController::getAirlineInfo($airline->id);
        }, self::getAirlines($airport));
        $result['rating'] = self::compound($airport);
        return $result;
    }

    public static function getAirlines($airport) {
        return DB::table('airports')
            ->join('airport_airlines', 'airport_airlines.id_airport', '=', $airport->id)
            ->join('airlines', 'airlines.id', '=', 'airport_airlines.id_airline')
            ->get()->toArray();
    }
}