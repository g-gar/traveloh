<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $table = 'airports';
    protected $fillable = [
        'code', 'location'
    ];

    protected $guarded = [
        
    ];

    protected $hidden = [
        
    ];
    public $timestamps = false;
}
