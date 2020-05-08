<?php

namespace App\Http\Controllers;

use App\Model\Airline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InfoAirlinesController extends Controller
{
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
}
