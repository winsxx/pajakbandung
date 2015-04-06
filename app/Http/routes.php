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

Route::get('sptpdview', 'PajakController@showSptpd');

Route::get('statuspajak', 'PajakController@showStatus');

Route::get('tutupnpwpd','WajibPajakController@tutupnpwpd');

Route::get('hapusnpwpd','WajibPajakController@hapusnpwpd');

Route::get('editnpwpd','WajibPajakController@editnpwpd');

Route::get('tambahnpwpd','WajibPajakController@tambahnpwpd');

Route::get('homewp', function(){
	return view('homeWp');
});

Route::get('homedinas', function(){
	return view('DinasHome');
});




Route::get('kelolapajak', function(){
	return view('DinasPajak');
});

Route::get('kelolanpwpd', function(){
	return view('DinasNpwpd');
});

Route::get('kelolasptpd', function(){
	return view('DinasSptpd');
});

/*Route::get('login', function(){
	return view('auth.login');
});*/

Route::get('daftar', function(){
	return view('wajibpajak.register');
});

Route::get('setting',function(){
	return view('SettingWp');
});

Route::get('settingpajak',function(){
	return view('SettingPajak');
});

Route::get('tambahpengelola',function(){
	return view('tambahpengelola');
});

Route::get('tutuppajak', function(){
	return view('tutuppajak');
});

/*Route::get('tutupnpwpd',function(){
	return view('tutupnpwpd');
});*/

Route::controllers([
    '/' => 'Auth\AuthController',
]);


