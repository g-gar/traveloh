<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Twitter extends Model
{
    protected $table = 'twitter';
    protected $fillable = [
        'id_tweet'
    ];

    protected $guarded = [
        
    ];

    protected $hidden = [
        
    ];
    public $timestamps = false;
}
