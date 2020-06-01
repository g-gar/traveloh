<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller\TuTiempoScrapperController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['api'])->group(function() {

    Route::get('execute/scrapper/tutiempo.net/{code}', 'TuTiempoScrapperController@init');

    Route::get('execute/scrapper/tripadvisor.es/{code}', 'TripAdvisorScrapperController@init');
    Route::get('execute/sentiment/tripadvisor.es/{code}', 'TripAdvisorSentimentController@init');

    Route::get('execute/scrapper/twitter.com/{code}', 'TwitterScrapperController@init');
    Route::get('execute/sentiment/twitter.com/{code}', 'TwitterSentimentController@init');

    Route::get('execute/scrapper/aena.es/{code}', 'AenaScrapperController@init');

    Route::get('execute/scrappers/all', 'ExecScrappers@init');


    Route::get('info/airports/ranking', 'AirportsController@getRanking');
    Route::get('info/airports/', 'AirportsController@getAirports');
    Route::get('info/airports/{airport}', 'AirportsController@getAirport');

    Route::get('info/airlines/ranking', 'AirlinesController@rank');
    Route::get('info/airlines/', 'AirlinesController@getAirlines');
    Route::get('info/airlines/{airline}', 'AirlinesController@getAirline');

    Route::get('info/flights/', 'FlightsController@getFlightsInfo');
    Route::get('info/flights/{flight}', 'FlightsController@getFlightInfo');

});

