<?php

namespace App\Http\Controllers;

use App\Model\Airline;
use App\Model\Airport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InfoAirportsController extends Controller
{
    public static function rank() {
        $results = [];
        foreach (Airport::all() as $airport) {
            $results[$airport->id] = self::compound($airport);
        }
        return $results;
    }

    public static function compound($airport) {
        $result = 0.0;
        $airlines = DB::table('airports')
            ->join('airport_airlines', 'airport_airlines.id_airport', '=', $airport->id)
            ->join('airlines', 'airlines.id', '=', 'airport_airlines.id_airline')
            ->get()->toArray();
        try {
            $result = array_reduce($airlines, function($accumulator, $airline) {
                return $accumulator + InfoAirlinesController::compound($airline);
            }, 0.0) / count($airlines);
        } catch (\Throwable $th) {}
        return $result;
    }
}