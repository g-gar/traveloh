<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TuTiempo extends Model
{
    protected $table = 'tu_tiempo';
    protected $fillable = [
        'weather', 'temperature', 'hour', 'wind', 'humidity', 'amospheric_pressure',
        'timestamp'
    ];

    protected $guarded = [
        
    ];

    protected $hidden = [
        
    ];
    protected $casts = [
        'timestamp' => 'date'
    ];
    public $timestamps = false;
}
