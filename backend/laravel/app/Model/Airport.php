<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $table = 'airlines';
    protected $fillable = [
        'name', 'location'
    ];

    protected $guarded = [
        
    ];

    protected $hidden = [
        
    ];
    public $timestamps = false;
}
