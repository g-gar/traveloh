<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SentimentAnalysisData extends Model
{
    protected $table = 'weather_data';
    protected $fillable = [
        'name', 'source', 'positive', 'negative', 'neutral', 'compound', 'text'
    ];

    protected $guarded = [
        
    ];

    protected $hidden = [
        
    ];
    public $timestamps = false;
}
