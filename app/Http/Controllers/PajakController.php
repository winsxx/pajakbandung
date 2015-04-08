<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pajak;
use App\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PajakController extends Controller {

	/*
	public function showKelola(){
		return view('kelolapajak');
	}
	
	public function showSptpd(){
		return view('sptpdview');
	}
	
	public function showStatus(){
		return view('statuspajak');
	}*/

    public function getSettingPajak($id){

        $pajak = Auth::user()->wajibpajak->pajak()->findOrFail($id);
        $kolaborator = $pajak->kolaborator;
        return view('pajak.settingpajak',compact('kolaborator','pajak'));
    }

    public function getTambahPengelola($id){
        $pajak = Auth::user()->wajibpajak->pajak()->findOrFail($id);
        return view('pajak.tambahpengelolapajak', compact('pajak'));
    }

    public function postTambahPengelola(Request $request, $id){
        $pajak = Auth::user()->wajibpajak->pajak()->findOrFail($id);
        $penduduk = Penduduk::find($request->no_ktp);
        if($penduduk == null){
            $error = ['no_ktp' => 'Tidak ada penduduk dengan nomor KTP tersebut'];
            return redirect('/settingpajak/'.$pajak->id.'/tambahpengelola')->withErrors($error);
        }
        if($pajak->kolaborator->contains($request->no_ktp)) {
            $error = ['no_ktp' => 'Orang tersebut telah terdaftar sebagai kolaborator sebelumnya'];
            return redirect('/settingpajak/'.$pajak->id.'/tambahpengelola')->withErrors($error);
        }
        $pajak->kolaborator()->attach($request->no_ktp);
        return redirect('/settingpajak/'.$pajak->id);
    }

    public function getMohonTutup(){
        return view('pajak.tutuppajak');
    }

    public function postMohonTutup(){
        return view('pajak.tutuppajak');
    }

}
