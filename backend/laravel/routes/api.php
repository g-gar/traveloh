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

Route::get('execute/scrapper/tutiempo.net/{code}', 'TuTiempoScrapperController@init');

Route::get('execute/scrapper/tripadvisor.es/{code}', 'TripAdvisorScrapperController@init');
Route::get('execute/sentiment/tripadvisor.es/{code}', 'TripAdvisorSentimentController@init');

Route::get('execute/scrapper/twitter.com/{code}', 'TwitterScrapperController@init');
Route::get('execute/sentiment/twitter.com/{code}', 'TwitterSentimentController@init');

Route::get('execute/scrapper/aena.es/{code}', 'AenaScrapperController@init');

Route::get('info/airports/ranking', 'AirportsController@rank');
Route::get('info/airports/', 'AirportsController@getAirportsInfo');
Route::get('info/airports/{airport}', 'AirportsController@getAirportInfo');

Route::get('info/airlines/ranking', 'AirlinesController@rank');
Route::get('info/airlines/', 'AirlinesController@getAirlinesInfo');
Route::get('info/airlines/{airline}', 'AirlinesController@getAirlineInfo');

Route::get('info/flights/', 'FlightsController@getFlightsInfo');
Route::get('info/flights/{flight}', 'FlightsController@getFlightInfo');