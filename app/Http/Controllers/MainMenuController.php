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
        $daftarPajakKolab = Auth::user()->kolaborasipajak;
        $daftarPajakSendiri =  Auth::user()->wajibpajak->pajak;

        return view('mainmenu.wphome', compact('daftarPajakKolab','daftarPajakSendiri'));
    }

    public function getIndex(){
        return view('mainmenu.landing');
    }

    public function testing(){
        return Auth::user()->wajibpajak->izinUsaha;
        return Auth::user()->kolaborasipajak;
        return Auth::user()->wajibpajak()->get()->first()->npwpd;
    }

    public function showListSptpd(){
        $listSptpd = Sptpd::sptpdLengkap()->all();
        return view('sptpd.dinassptpd',compact('listSptpd'));
    }
}
