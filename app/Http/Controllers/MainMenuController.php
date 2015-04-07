<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Penduduk;
use Illuminate\Http\Request;

class MainMenuController extends Controller {

    public function getDinasHome(){
        return view('mainmenu.dinashome');
    }

    public function getWpHome(){
        return view('mainmenu.wphome');
    }

    public function getIndex(){
        return view('mainmenu.landing');
    }

    public function testing(){
        //return dd(Penduduk::find(123)->kolaborasiPajak());
    }

}
