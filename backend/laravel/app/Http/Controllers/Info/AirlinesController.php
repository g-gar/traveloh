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
            $results[$airline->id] = self::getRating($airline);
        }
        return $results;
    }

    public static function getRating($airline) {
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
    public static function getAirlines() {
        return Airline::all();
    }

    /**
	 * Returns an airlines complete information
	 */
    public static function getAirline($id) {
        $airline = Airline::where('id', $id)->firstOrFail();
        $result['airline'] = $airline;
        $result['flights'] = self::getFlights($airline);
        $result['rating'] = self::getRating($airline);
        $result['comments'] = self::getComments($airline);
        return $result;
    }

    public static function getFlights($airline) {
        return array_map(function($flight){
            return FlightsController::getFlightInfo($flight->id);
        }, DB::table('airlines')
            ->join('flight_data', 'flight_data.id_airline', '=', $airline->id)
            ->join('aena', 'aena.id', '=', 'flight_data.id')
            ->get()
            ->toArray()
        );
    }

    public static function getComments(Airline $airline){
        return DB::table('tripadvisor')
            ->join('sentiment_analysis_data', 'sentiment_analysis_data.id_airline', '=', $airline->id)
            ->select('text')
            ->get()
            ->toArray();
    }
}
