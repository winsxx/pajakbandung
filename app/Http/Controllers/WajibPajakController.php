<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class WajibPajakController extends Controller {

    public function getDaftarNpwpd(){
        return view('wajibpajak.registernpwpd');
    }

    public function postDaftarNpwpd(Request $request){
        $izin = \App\IzinUsaha::find($request->no_ijin_usaha);

        if($izin == null){
            $error = ['no_izin_usaha' => 'Izin usaha tidak ditemukan atau Anda bukan merupakan pemilik izin usaha'];
            return redirect('daftar')->withErrors($error);
        }

        if($izin->no_ktp_pemilik != Auth::user()->no_ktp){
            $error = ['no_izin_usaha' => 'Izin usaha tidak ditemukan atau Anda bukan merupakan pemilik izin usaha'];
            return redirect('daftar')->withErrors($error);
        }

        if($izin->status != 'aktif'){
            $error = ['no_izin_usaha' => 'Izin usaha sudah tidak aktif'];
            return redirect('daftar')->withErrors($error);
        }

        $wp = new \App\WajibPajak;
        $wp->no_ktp_pemilik = Auth::user()->no_ktp;
        $wp->no_izin_usaha = $request->no_ijin_usaha;
        $wp->status = "Aktif";

        $wp->save();
        return redirect('/');
    }

    public function getSettingPajak(){
        $daftarPajak =  Auth::user()->wajibpajak->pajak;
        return view('wajibpajak.settingnpwpd')->with('daftarPajak',$daftarPajak);
    }

    public function getTutupNpwpd(){
        return view('wajibpajak.tutupnpwpd');
    }

    public function postTutupNpwpd(Request $request){
        if(! $request->hasFile('dokumen')){
            $error = ['dokumen' => 'Harus upload file'];
            return redirect('tutupnpwpd')->withErrors($error);
        }
        $dokumen = $request->file('dokumen');
        if( !$dokumen->isValid()){
            $error = ['dokumen' => 'Upload file gagal'];
            return redirect('tutupnpwpd')->withErrors($error);
        }
        if($dokumen->getClientOriginalExtension()!='pdf'){
            $error = ['dokumen' => 'File harus berupa pdf'];
            return redirect('tutupnpwpd')->withErrors($error);
        }
        $filename = 'tutup_'.Auth::user()->wajibpajak->npwpd.'.pdf';
        $dokumen->move('file', $filename);

        $wp = Auth::user()->wajibpajak;
        $wp->lokasi_file = $filename;
        $wp->status = 'proses_nonaktif';
        $wp->save();
        return Redirect::to('tutupnpwpd');
    }

    public function getTambahPajak(){
        return view('wajibpajak.tambahpajak');
    }

    public function getKelolaNpwpd(){
        return view('wajibpajak.dinasnpwpd');
    }

}
