<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FlightData extends Model
{
    protected $table = 'flight_data';
    protected $fillable = [
        'name', 'source', 'airline'
    ];

    protected $guarded = [
        
    ];

    protected $hidden = [
        
    ];
    public $timestamps = false;
}
