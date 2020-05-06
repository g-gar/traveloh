<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Aena extends Model
{
    protected $table = 'aena';
    protected $fillable = [
        'flight_code', 'year', 'month', 'day', 'hour', 'scheduled_hour', 'destination'
    ];

    protected $guarded = [
        
    ];

    protected $hidden = [
        
    ];
    public $timestamps = false;
}
