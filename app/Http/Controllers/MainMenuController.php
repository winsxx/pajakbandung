<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return Auth::user()->wajibpajak()->get()->first()->npwpd;
    }

}
