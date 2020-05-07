<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $table = 'airlines';
    protected $fillable = [
        'code', 'location'
    ];

    protected $guarded = [
        
    ];

    protected $hidden = [
        
    ];
    public $timestamps = false;
}
