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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('KelolaPajak', 'PajakController@showKelola');

Route::get('SptpdView', 'PajakController@showSptpd');

Route::get('StatusPajak', 'PajakController@showStatus');

Route::get('homewp', function(){
	return view('homeWp');
});

Route::get('homedinas', function(){
	return view('DinasHome');
});

/*Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);*/
