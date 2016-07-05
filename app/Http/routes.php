<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

Route::group(['prefix' => 'api','as'=>'api.','namespace'=>'Api'], function () {
    Route::get('days', [
    	'as' => 'days', 'uses' => 'DayController@index'
	]);
	Route::post('days', [
    	'as' => 'days.create', 'uses' => 'DayController@create'
	]);
});