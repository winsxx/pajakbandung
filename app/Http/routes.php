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

/*MainMenuController*/
Route::get('/', 'MainMenuController@getIndex');
Route::get('home', 'MainMenuController@getWpHome');
Route::get('admin/home', 'MainMenuController@getDinasHome');


/*Auth*/
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');
Route::get('logout', 'Auth\AuthController@getLogout');

/*
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

Route::post('wajibpajak/register', 'WajibPajakController@daftarnpwpd');

/*Route::get('tutupnpwpd',function(){
	return view('tutupnpwpd');
});*/


