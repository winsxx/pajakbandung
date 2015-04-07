<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WajibPajakController extends Controller {

	//
	public function tutupnpwpd(){
		return view('tutupnpwpd');
	}

	public function editnpwpd(){
		return view('editnpwpd');
	}

	public function hapusnpwpd(){
		return view('hapusnpwpd');
	}

	public function tambahnpwpd(){
		return view('tambahnpwpd');
	}

    public function getDaftarNpwpd(){
        return view('wajibpajak.registernpwpd');
    }

    public function postDaftarNpwpd(Request $request){
        $wp = new \App\WajibPajak;
        $wp->no_ktp_pemilik = Auth::user()->no_ktp;
        $wp->no_izin_usaha = $request->no_ijin_usaha;
        $wp->status = "Aktif";

        $wp->save();
        return redirect('/');
    }
}
