<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ScrapperController;

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


Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/ping', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    return "ok";
});

Route::get('execute/tutiempo.net/{airport}', function($airport) {
    return ScrapperController::execute("tutiempo.net", $airport);
});