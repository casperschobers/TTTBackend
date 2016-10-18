<?php

use Illuminate\Http\Request;

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

Route::get('/info', function (Request $request) {
    return response()->json(["app" => "TouchTheTree", "version" => "1.0"]);
});

Route::post('/start', 'PlayerController@postNumber');

Route::post('/found', 'GameController@postFound');

Route::get('/status', 'GameController@getStatus');

Route::get('/score', 'GameController@getScore');
