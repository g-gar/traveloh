<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Guest extends User
{
    protected $table = 'guests';
    protected $fillable = [
        'request', 'response'
    ];

    protected $guarded = [
        
    ];

    protected $hidden = [
        
    ];
    public $timestamps = false;
}
