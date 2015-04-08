<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pajak;
use App\Penduduk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

    public function getMohonTutup($id){
        return view('pajak.tutuppajak')->with('id',$id);
    }

    public function postMohonTutup(Request $request, $id){
        $this->validate($request, [
            'alasan' => 'required|max:200',
        ]);

        $pajak = Auth::user()->wajibpajak->pajak()->findOrFail($id);

        $pajak->alasan_penutupan = $request->alasan;
        $pajak->status = "proses_nonaktif";

        $pajak->save();
        return redirect('/settingpajak/'.$pajak->id);
    }

    public function getMenuPajak($id){
        $temp = Auth::user()->wajibpajak->pajak()->find($id);
        $temp2 = Auth::user()->kolaborasipajak->contains($id);
        if($temp == null && $temp2 == false)
            return redirect('/home');
        $pajak = Pajak::find($id);
        $izin = $pajak->wajibPajak->izinUsaha;
        return view('pajak.menuperpajak', compact('pajak','izin'));
    }

    public function getSptpd($id){
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        return view('sptpd.sptpdhotel',compact('year','month'));
    }
}
