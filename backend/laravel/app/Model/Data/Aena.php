<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aena extends Model
{
    protected $table = 'flight_data';
    protected $fillable = [
        'name', 'source', 'airline', 'id_weather_data',
        'flight_code', 'year', 'month', 'day', 'time', 'scheduled_time', 'destination'
    ];

    protected $guarded = [
        
    ];

    protected $hidden = [
        
    ];
    public $timestamps = false;
}
