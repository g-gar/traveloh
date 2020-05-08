<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SentimentAnalysisData extends Model
{
    protected $table = 'sentiment_analysis_data';
    protected $fillable = [
        'id_airline',
        'positive', 'negative', 'neutral', 'compound', 'text'
    ];

    protected $guarded = [
        
    ];

    protected $hidden = [
        
    ];
    public $timestamps = false;
}
