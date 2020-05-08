<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TwitterSentimentController extends SentimentController
{
    public static function init($code){
        return 'OK';
    }
}
