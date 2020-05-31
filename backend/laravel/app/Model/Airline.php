<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    protected $table = 'airlines';
    protected $fillable = [
        'tripadvisor_code', 'name', 'tripadvisor_name', 'aena_name'
    ];

    protected $guarded = [
        
    ];

    protected $hidden = [
        
    ];
    public $timestamps = false;
}
