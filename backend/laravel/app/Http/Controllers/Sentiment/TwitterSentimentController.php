<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TwitterSentimentController extends SentimentController
{
    /**
     * Executes the Twitter sentiment analysis on each tweet
	 * @urlParam airline-code required The airline code. Example: Aerolinea-De-Antioquia
	 */
    public static function init($code){
        return 'Not implemented yet';
    }
}
