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
Route::get('/', ['uses' => 'MainMenuController@getSso']);
Route::get('land', ['uses' => 'MainMenuController@getIndex']);
Route::get('home', ['uses' => 'MainMenuController@getWpHome', 'middleware' => 'auth']);
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
Route::post('tambahpajak',['uses' => 'WajibPajakController@postTambahPajak','middleware' => 'wajibpajak']);

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
Route::post('pajak/{id}/sspd', ['uses' => 'PajakController@postSspd','middleware' => 'auth']);
Route::get('pajak/{id}/skpd/{skpd_id}', ['uses' => 'PajakController@showSkpd','middleware' => 'auth']);
Route::get('pajak/{id}/skpdkb/{skpdkb_id}', ['uses' => 'PajakController@showSkpdkb','middleware' => 'auth']);
Route::get('pajak/{id}/skpdall', ['uses' => 'PajakController@showSkpdAll','middleware' => 'auth']);

Route::get('admin/kelolaskpd', ['uses' => 'PajakController@getKelolaSkpd','middleware' => 'admin']);
Route::get('admin/kelolapajak', ['uses' => 'PajakController@getKelolaPajak','middleware' => 'admin']);
Route::get('admin/kelolasspd', ['uses' => 'PajakController@getKelolaSspd','middleware' => 'admin']);
Route::get('admin/kelolaskpdkb', ['uses' => 'PajakController@getKelolaSkpdkb','middleware' => 'admin']);
Route::get('admin/kelolasptpd', ['uses' => 'PajakController@getKelolaSptpd','middleware' => 'admin']);
Route::get('admin/pajak/{id}/hapusptpd', ['uses' => 'PajakController@hapusSptpd','middleware' => 'admin']);
Route::get('admin/kelolanpwpd', ['uses' => 'PajakController@getKelolaNpwpd','middleware' => 'admin']);
Route::get('admin/kelolapbb',['uses' => 'PajakController@getKelolaPbb','middleware' => 'admin']);
Route::get('admin/pajak/{id}/tutuppajak',['uses' => 'PajakController@getTutupPajak','middleware' => 'admin'] );
Route::get('admin/pajak/{id}/aktifkanpajak',['uses' => 'PajakController@getAktifkanPajak','middleware' => 'admin'] );
Route::get('admin/pajak/{id}/hapuspajak',['uses' => 'PajakController@getHapusPajak','middleware' => 'admin'] );
Route::get('admin/pajak/{id}/kirimskpd',['uses' => 'PajakController@getKirimSkpd','middleware' => 'admin'] );
Route::get('admin/pajak/{id}/kirimskpdkb',['uses' => 'PajakController@getKirimSkpdkb','middleware' => 'admin']);
Route::get('admin/pajak/{id}/kirimskpdkbpbb',['uses' => 'PajakController@getKirimSkpdkbPbb','middleware' => 'admin']);
Route::get('admin/pajak/{id}/hapussspd/', ['uses' => 'PajakController@getHapusSspd','middleware' => 'admin']);
Route::get('admin/pajak/{id}/tutupnpwpd', ['uses' => 'PajakController@getTutupNpwpd','middleware' => 'admin']);
Route::get('admin/pajak/{id}/hapusnpwpd', ['uses' => 'PajakController@getHapusNpwpd','middleware' => 'admin']);

Route::get('admin/skpd/pbb', ['uses' => 'PajakController@genereteAllPbbSkpd', 'middleware' => 'admin']);
Route::get('admin/skpdkb/pbb', ['uses' => 'PajakController@genereteAllPbbSkpdkb', 'middleware' => 'admin']);
/*Unimportant*/
Route::get('debug', 'MainMenuController@testing');

