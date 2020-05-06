<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TuTiempo extends Model
{
    protected $table = 'weather_data';
    protected $fillable = [
        'name', 'source', 
        'weather', 'temperature', 'thermal_sensation', 'dust', 'wind_gust', 'humidity', 'cloud_factor', 'precipitation', 'atmospheric_pressure'
    ];

    protected $guarded = [
        
    ];

    protected $hidden = [
        
    ];
    public $timestamps = false;
}
