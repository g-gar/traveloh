<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TripAdvisor extends Model
{
    protected $table = 'tripadvisor';
    protected $fillable = [
        'ip_opinion', 'title', 'language'
    ];

    protected $guarded = [
        
    ];

    protected $hidden = [
        
    ];
    public $timestamps = false;
}
