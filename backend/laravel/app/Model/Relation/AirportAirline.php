<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AirportAirline extends Model
{
    protected $table = 'airport_airlines';
    protected $fillable = [
        'id_airport', 'id_airline'
    ];

    protected $guarded = [
        
    ];

    protected $hidden = [
        
    ];
    public $timestamps = false;
}
