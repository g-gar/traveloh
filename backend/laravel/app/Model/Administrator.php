<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    protected $table = 'administrators';
    protected $fillable = [
        'username', 'password', 'email', 'token', 
    ];

    protected $guarded = [
        'token', 'password'
    ];

    protected $hidden = [
        'token', 'password'
    ];
    public $timestamps = false;
}
