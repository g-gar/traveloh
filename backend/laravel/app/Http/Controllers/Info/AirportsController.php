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
    public static function getRanking() {
        $results = [];
        foreach (Airport::all() as $airport) {
            $results[$airport->id] = self::getRating($airport);
        }
        return $results;
    }

    public static function getRating($airport) {
        $result = 0.0;
        try {
            $airlines = self::getAirlines($airport);
            $result = array_reduce($airlines, function($accumulator, $airline) {
                return $accumulator + AirlinesController::getRating($airline);
            }, 0.0) / count($airlines);
        } catch (\Throwable $th) {}
        return $result;
    }

    /**
	 * Returns all airport complete information
	 */
    public static function getAirports(){
        return Airport::all();
    }

    /**
	 * Returns an airport complete information
     * @urlParam airport required The airport code. Example: MAD
	 */
    public static function getAirport($code) {
        $airport = Airport::where('code', '=', $code)->firstOrFail();
        $result['airport'] = $airport;
        $result['airlines'] = array_map(function($airline){
            return AirlinesController::getAirlines($airline->id);
        }, self::getAirlines($airport));
        $result['rating'] = self::getRating($airport);
        return $airport;
    }

    public static function getAirlines($airport) {
        return DB::table('airports')
            ->join('airport_airlines', 'airport_airlines.id_airport', '=', $airport->id)
            ->join('airlines', 'airlines.id', '=', 'airport_airlines.id_airline')
            ->get()->toArray();
    }
}