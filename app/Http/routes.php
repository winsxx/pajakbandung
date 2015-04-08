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
Route::get('/', ['uses' => 'MainMenuController@getIndex']);
Route::get('home', ['uses' => 'MainMenuController@getWpHome', 'middleware' => 'wajibpajak']);
Route::get('admin/home', ['uses' => 'MainMenuController@getDinasHome','middleware' => 'admin']);


/*Auth*/
Route::get('login', ['uses' => 'Auth\AuthController@getLogin', 'middleware' => 'guest']);
Route::post('login', ['uses' => 'Auth\AuthController@postLogin','middleware' => 'guest']);
Route::get('register', ['uses' => 'Auth\AuthController@getRegister','middleware' => 'guest']);
Route::post('register', ['uses' => 'Auth\AuthController@postRegister','middleware' => 'guest']);
Route::get('logout', 'Auth\AuthController@getLogout');


/*WajibPajak*/
Route::get('daftar', ['uses' => 'WajibPajakController@getDaftarNpwpd','middleware' => 'auth']);
Route::post('daftar', ['uses' => 'WajibPajakController@postDaftarNpwpd','middleware' => 'auth']);
Route::get('setting',['uses' => 'WajibPajakController@getSettingPajak','middleware' => 'wajibpajak']);
Route::get('tutupnpwpd',['uses' => 'WajibPajakController@getTutupNpwpd','middleware' => 'wajibpajak']);
Route::post('tutupnpwpd',['uses' => 'WajibPajakController@postTutupNpwpd','middleware' => 'wajibpajak']);
Route::get('tambahpajak',['uses' => 'WajibPajakController@getTambahPajak','middleware' => 'wajibpajak']);

/*Pajak*/
Route::get('settingpajak/{id}', ['uses' => 'PajakController@getSettingPajak','middleware' => 'wajibpajak']);
Route::get('settingpajak/{id}/tambahpengelola', ['uses' => 'PajakController@getTambahPengelola','middleware' => 'wajibpajak']);
Route::post('settingpajak/{id}/tambahpengelola', ['uses' => 'PajakController@postTambahPengelola','middleware' => 'wajibpajak']);
Route::get('settingpajak/{id}/tutup', ['uses' => 'PajakController@getMohonTutup','middleware' => 'wajibpajak']);
Route::post('settingpajak/{id}/tutup', ['uses' => 'PajakController@postMohonTutup','middleware' => 'wajibpajak']);
Route::get('pajak/{id}', ['uses' => 'PajakController@getMenuPajak','middleware' => 'auth']);
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
	//$data = Auth::User()->kolaborasiPajak();
	//return view('SettingWp')->with('daftarpajak', $data);
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

Route::get('debug', 'MainMenuController@testing');

