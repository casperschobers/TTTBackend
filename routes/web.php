<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/', 'GameController@getGamePage');
Route::get('/game', 'GameController@getGamePage');
Route::get('/target', 'TargetController@getNew');
Route::get('images/{filename}', function ($filename)
{
    return Image::make(storage_path() . '/app/images/' . $filename)->response();
});

Route::post('endgame', array('uses' => 'GameController@postEnd'));
Route::post('startgame', array('uses' => 'GameController@postStart'));
Route::post('newtarget', array('uses' => 'TargetController@postCreate'));