<?php

namespace App\Http\Controllers;

use App\Model\SentimentAnalysisData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TripAdvisorSentimentController extends SentimentController
{
    /**
     * Executes the TripAdvisor sentiment analysis on each review
	 * @urlParam airline-code required The airline code. Example: Aerolinea-De-Antioquia
	 */
    public static function init($tripadvisor_code) {
        $sentiment_analysis_datas = DB::table('airlines')
            ->join('sentiment_analysis_data', function($join) {
                $join->on('sentiment_analysis_data.id_airline', '=', 'airlines.id')
                     ->where('sentiment_analysis_data.compound', '=', null);
            })
            ->join('tripadvisor', 'tripadvisor.id', '=', 'sentiment_analysis_data.id')
            ->having('airlines.tripadvisor_code', $value = $tripadvisor_code)
            ->groupBy('tripadvisor.id')
            ->select('sentiment_analysis_data.*')
            ->get()
            ->toArray();

        foreach ($sentiment_analysis_datas as $sentiment_analysis_data) {
            $r = parent::execute([$sentiment_analysis_data->text]);
            $r = json_decode($r[0][0]);
            
            $s = SentimentAnalysisData::find($sentiment_analysis_data->id);
            $s->positive = $r->pos;
            $s->negative = $r->neg;
            $s->neutral = $r->neu;
            $s->compound = $r->compound;
            $s->save();
        }
    }
}
