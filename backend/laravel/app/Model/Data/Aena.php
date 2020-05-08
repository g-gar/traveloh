<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Aena extends Model
{
    protected $table = 'aena';
    protected $fillable = [
        'hour', 'flight_code', 'destination', 'company', 'terminal'
    ];

    protected $guarded = [
        
    ];

    protected $hidden = [
        
    ];
    public $timestamps = false;
}
