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
Route::get('admin/kelolasptpd', ['uses' => 'MainMenuController@showListSptpd','middleware' => 'admin']);

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
Route::get('pajak/{id}/sptpd', ['uses' => 'PajakController@getSptpd','middleware' => 'auth']);
Route::post('pajak/{id}/sptpdHotel', ['uses' => 'PajakController@postSptpdHotel','middleware' => 'auth']);
Route::post('pajak/{id}/sptpdRestoran', ['uses' => 'PajakController@postSptpdRestoran','middleware' => 'auth']);
Route::get('pajak/{id}/sspd', ['uses' => 'PajakController@getSspd','middleware' => 'auth']);


// Route::get('npwpd', function(){
// 	return view('wajibpajak.dinasnpwpd');
// });
// Route::get('pajakdinas', function(){
// 	return view('pajak.dinaspajak');
// });
// Route::get('dinas', function(){
// 	return view('mainmenu.dinashome');
// });
// Route::get('sptpddinas', function(){
// 	return view('sptpd.dinassptpd');
// });
// Route::get('sspd', function(){
// 	return view('sspd.sspd');
// });
// Route::get('kelolasspd', function(){
// 	return view('sspd.dinassspd');
// });
// Route::get('kelolaskpd', function(){
// 	return view('skpd.dinasskpd');
// });
// Route::get('kelolaskpdkb', function(){
// 	return view('skpd.dinasskpdkb');
// });

Route::post('pajak/{id}/sspd', ['uses' => 'PajakController@postSspd','middleware' => 'auth']);

Route::get('debug', 'MainMenuController@testing');
