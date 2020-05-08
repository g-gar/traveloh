<?php

namespace App\Http\Controllers;

use App\Model\Airline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AirlinesController extends Controller
{
    /**
	 * Returns the airlines ranked by rating
	 */
    public static function rank() {
        $results = [];
        foreach (Airline::all() as $airline) {
            $results[$airline->id] = self::compound($airline);
        }
        return $results;
    }

    public static function compound($airline) {
        $result = 0.0;
        $temp = DB::table('sentiment_analysis_data')
                ->where('sentiment_analysis_data.id_airline', '=', $airline->id)
                ->whereNotNull('compound')
                ->select('compound')
                ->get()
                ->toArray();

        try {
            $result = array_reduce($temp, function($accumulator, $sentiment){
                return $accumulator + (double)$sentiment->compound;
            }, 0.0) / count($temp);
        } catch (\Throwable $th) {}
        return $result;
    }

    /**
	 * Returns all airlines complete information
	 */
    public static function getAirlinesInfo() {
        foreach (Airline::all() as $airline) {
            $results[$airline->id] = self::getAirlineInfo($airline->id);
        }
        return $results;
    }

    /**
	 * Returns an airlines complete information
	 */
    public static function getAirlineInfo($id) {
        $airline = Airline::where('id', $id)->firstOrFail();
        $result['airline'] = $airline;
        $result['rating'] = self::compound($airline);
        $result['flights'] = self::getFlights($airline);
        return $result;
    }

    public static function getFlights($airline) {
        return array_map(function($flight){
            return FlightsController::getFlightInfo($flight->flight_code);
        }, DB::table('airlines')
            ->join('flight_data', 'flight_data.id_airline', '=', $airline->id)->get()->toArray()
        );
    }
}
