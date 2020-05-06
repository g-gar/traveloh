<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WeatherData extends Model
{
    protected $table = 'weather_data';
    protected $fillable = [
        
    ];

    protected $guarded = [
        
    ];

    protected $hidden = [
        
    ];
    public $timestamps = false;
}
