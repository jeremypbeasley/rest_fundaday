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

Route::get('/thank-you/{encrypted}', function ($encrypted) {
	$valid_test = $encrypted == 'test' && App::environment('local');
	if(!$valid_test){
		try{
			$decrypted = Crypt::decrypt($encrypted);
		}
		catch(Exception $e){
			return redirect('/');
		}
		$decrypted = explode('!', $decrypted);
		if(count($decrypted)!=3){
			return redirect('/');
		}
		$id = $decrypted[0];
		$customer_id = $decrypted[1];
		$message = $decrypted[2];
		if($message != 'rest4weary'){
			return redirect('/');
		}

		$day = Day::find($id);
		if(!$day){
			return redirect('/');
		}
		if($day->stripe_customer_id != $customer_id){
			return redirect('/');
		}
	}
	
	$view = [];
	$view['amount'] = $valid_test ? config('app.fund_a_day_amount') : $day->amount / 100; // get amount in dollars
	$view['email'] = $valid_test ? 'test@iwantrest.com' : $day->donor_email;
	$view['date'] = $valid_test ? '07/25/2016' : date('m/d/Y',strtotime($day->day));

    return view('thank-you',$view);
});

Route::group(['prefix' => 'api','as'=>'api.','namespace'=>'Api'], function () {
    Route::get('days', [
    	'as' => 'days', 'uses' => 'DayController@index'
	]);
	Route::post('days', [
    	'as' => 'days.create', 'uses' => 'DayController@create'
	]);
});