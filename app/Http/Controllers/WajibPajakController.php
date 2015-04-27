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

    public function postTambahPajak(Request $request){
           $wp=Auth::user()->wajibpajak;

           $pajak=new \App\Pajak;
           $pajak->npwpd_pemilik=$wp->npwpd;
           $pajak->status='aktif';

           if($request->bidang_usaha=='hotel'){
                $pajak->jenis_pajak='hotel';
                $pajak_khusus=new \App\PajakHotel;
                $pajak->save();
                $pajak_khusus->id=$pajak->id;
                $pajak_khusus->num_kamar_suite=$request->num_kamar_suite;
                $pajak_khusus->rate_high_suite=$request->rate_high_suite;
                $pajak_khusus->rate_low_suite=$request->rate_low_suite;                
                $pajak_khusus->num_kamar_deluxe=$request->num_kamar_deluxe;
                $pajak_khusus->rate_high_deluxe=$request->rate_high_deluxe;
                $pajak_khusus->rate_low_deluxe=$request->rate_low_deluxe;                
                $pajak_khusus->num_kamar_standar=$request->num_kamar_standar;
                $pajak_khusus->rate_high_standar=$request->rate_high_standar;
                $pajak_khusus->rate_low_standar=$request->rate_low_standar;
                if ($request->alat_bayar=='manual')
                    $pajak_khusus->alat_pembayaran='manual';
                else if ($request->alat_bayar=='komputer')
                    $pajak_khusus->alat_pembayaran='auto';
                $pajak_khusus->num_karyawan=$request->num_karyawan;
                $pajak_khusus->fasilitas_restoran=0;
                $pajak_khusus->fasilitas_hiburan=0;
                $pajak_khusus->fasilitas_laundry=0;
                $pajak_khusus->fasilitas_telpon=0;
                $pajak_khusus->fasilitas_parkir=0;
                if ($request->restoran=='1')    $pajak_khusus->fasilitas_restoran=1;
                if ($request->hiburan=='1')  $pajak_khusus->fasilitas_hiburan=1;
                if ($request->laundry=='1')  $pajak_khusus->fasilitas_laundry=1;
                if ($request->telpon=='1')  $pajak_khusus->fasilitas_telpon=1;
                if ($request->parkir=='1')  $pajak_khusus->fasilitas_parkir=1;
                $pajak_khusus->save();           
           }
           else if ($request->bidang_usaha=='restoran'){
                $pajak->jenis_pajak='restoran';
                $pajak_khusus=new \App\PajakRestoran;
           }
           else if ($request->bidang_usaha=='bumi-bangunan'){
                $pajak->jenis_pajak='bumi-bangunan';
                $pajak_khusus=new \App\PajakBumiBangunan;
           }           
           return Redirect::to('tambahpajak');
    }
    public function getKelolaNpwpd(){
        return view('wajibpajak.dinasnpwpd');
    }
}
