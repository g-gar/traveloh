<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FlightData extends Model
{
    protected $table = 'flight_data';
    protected $fillable = [
        'id_weather_data', 'id_airline'
    ];

    protected $guarded = [
        
    ];

    protected $hidden = [
        
    ];
    public $timestamps = false;
}
