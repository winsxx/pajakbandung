<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Penduduk;
use App\Sptpd;
use App\Sspd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainMenuController extends Controller {

    public function getDinasHome(){
        return view('mainmenu.DinasHome');
    }

    public function getWpHome(){
        $daftarPajakKolab = Auth::user()->kolaborasipajak;
        if(Auth::user()->hasNpwpd())
            $daftarPajakSendiri =  Auth::user()->wajibpajak->pajak;
        else
            $daftarPajakSendiri =[];
        if(count($daftarPajakKolab)==0 && count($daftarPajakSendiri)==0) return redirect('land');
        return view('mainmenu.wphome', compact('daftarPajakKolab','daftarPajakSendiri'));
    }

    public function getIndex(Request $request){
        if($request->id != null){
            $penduduk = Penduduk::where('id','=',$request->id)->first();
            if($penduduk != null) Auth::loginUsingId($penduduk->nik);
        }
        return view('mainmenu.landing');
    }

    public function getSso(){
        return view('check');
    }

    public function testing(){
        return Sspd::where('no_pajak','=',1)->orderBy('no_sspd','DESC')->first()->bulan;
    }

}
