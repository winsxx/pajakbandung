<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use DB;

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
           if($request->bidang_usaha=='hotel'){                
                $temp=DB::table('pajak')->where('npwpd_pemilik',Auth::user()->wajibpajak->npwpd)->where('jenis_pajak','hotel')->get();
                if ($temp==null){
                    $wp=Auth::user()->wajibpajak;           

                    $pajak=new \App\Pajak;
                    $pajak->npwpd_pemilik=$wp->npwpd;
                    $pajak->status='aktif';

                    $pajak->jenis_pajak='hotel';
                    $pajak_khusus=new \App\PajakHotel;
                    $this->validate($request, [
                        'num_kamar_suite' => 'required',
                        'rate_high_suite' => 'required',
                        'rate_low_suite' => 'required',
                        'num_kamar_deluxe' => 'required',
                        'rate_high_deluxe' => 'required',
                        'rate_low_deluxe' => 'required',
                        'num_kamar_standar' => 'required',
                        'rate_high_standar' => 'required',
                        'rate_low_standar' => 'required',
                        'jmlh_karyawan' => 'required',
                    ]);
                    $pajak_khusus->num_kamar_suite=$request->num_kamar_suite;
                    $pajak_khusus->rate_high_suite=$request->rate_high_suite;
                    $pajak_khusus->rate_low_suite=$request->rate_low_suite;                
                    $pajak_khusus->num_kamar_deluxe=$request->num_kamar_deluxe;
                    $pajak_khusus->rate_high_deluxe=$request->rate_high_deluxe;
                    $pajak_khusus->rate_low_deluxe=$request->rate_low_deluxe;                
                    $pajak_khusus->num_kamar_standar=$request->num_kamar_standar;
                    $pajak_khusus->rate_high_standar=$request->rate_high_standar;
                    $pajak_khusus->rate_low_standar=$request->rate_low_standar;                
                    if ($request->alat_bayar=='manual'){
                        $pajak_khusus->alat_pembayaran='manual';
                    }                    
                    else if ($request->alat_bayar=='komputer'){
                        $pajak_khusus->alat_pembayaran='auto';                
                    }                    
                    $pajak_khusus->fasilitas_restoran=0;
                    $pajak_khusus->fasilitas_hiburan=0;
                    $pajak_khusus->fasilitas_laundry=0;
                    $pajak_khusus->fasilitas_telpon=0;
                    $pajak_khusus->fasilitas_parkir=0;
                    if ($request->restoran=='1') {
                       $pajak_khusus->fasilitas_restoran=1; 
                   }                   
                    if ($request->hiburan=='1'){
                       $pajak_khusus->fasilitas_hiburan=1; 
                    }  
                    if ($request->laundry=='1'){
                       $pajak_khusus->fasilitas_laundry=1; 
                    }  
                    if ($request->telpon=='1'){
                       $pajak_khusus->fasilitas_telpon=1; 
                    }  
                    if ($request->parkir=='1') {
                      $pajak_khusus->fasilitas_parkir=1;  
                    } 
                    $pajak_khusus->num_karyawan=$request->jmlh_karyawan;
                    $pajak->save();
                    $pajak_khusus->id=$pajak->id;
                    $pajak_khusus->save();
                }
                else{
                    return Redirect::to('tambahpajak');
                }           
           }
           else if ($request->bidang_usaha=='restoran'){
                $temp=DB::table('pajak')->where('npwpd_pemilik',Auth::user()->wajibpajak->npwpd)->where('jenis_pajak','restoran')->get();
                if ($temp==null){
                    $wp=Auth::user()->wajibpajak;           

                    $pajak=new \App\Pajak;
                    $pajak->npwpd_pemilik=$wp->npwpd;
                    $pajak->status='aktif';
                    $pajak->jenis_pajak='restoran';
                    $pajak_khusus=new \App\PajakRestoran;
                    $this->validate($request, [                        
                        'jam_buka' => 'required|time24',
                        'jam_tutup' => 'required',
                        'num_meja' => 'required',
                        'num_kursi' => 'required',
                        'makanan_mahal' => 'required',
                        'makanan_murah' => 'required',
                        'minuman_mahal' => 'required',
                        'minuman_murah' => 'required',
                        'rata_penjualan' => 'required',
                        'num_karyawan' => 'required',                    
                    ]);
                    $pajak_khusus->jam_buka=$request->jam_buka;
                    $pajak_khusus->jam_tutup=$request->jam_tutup;
                    $pajak_khusus->jumlah_meja=$request->num_meja;
                    $pajak_khusus->jumlah_kursi=$request->num_kursi;
                    $pajak_khusus->harga_makanan_termahal=$request->makanan_mahal;
                    $pajak_khusus->harga_makanan_termurah=$request->makanan_murah;
                    $pajak_khusus->harga_minuman_termahal=$request->minuman_mahal;
                    $pajak_khusus->harga_minuman_termurah=$request->minuman_murah;
                    $pajak_khusus->penjualan_per_hari=$request->rata_penjualan;
                    $pajak_khusus->jumlah_pegawai=$request->num_karyawan;
                    $pajak->save();
                    $pajak_khusus->id=$pajak->id;
                    $pajak_khusus->save();
                }
                else{
                    return Redirect::to('tambahpajak');
                }
           }
           else if ($request->bidang_usaha=='bumi_bangunan'){
                $temp=DB::table('pajak')->where('npwpd_pemilik',Auth::user()->wajibpajak->npwpd)->where('jenis_pajak','pbb')->get();
                if ($temp == null){
                    $wp=Auth::user()->wajibpajak;           

                    $pajak=new \App\Pajak;
                    $pajak->npwpd_pemilik=$wp->npwpd;
                    $pajak->status='aktif';
                    $pajak->jenis_pajak='pbb';
                    $pajak_khusus=new \App\PajakBumiBangunan;
                    $this->validate($request, [
                        'tanah_panjang' => 'required',
                        'tanah_lebar' => 'required',
                        'bangunan_panjang' => 'required',
                        'bangunan_lebar' => 'required',
                    ]);
                    $pajak_khusus->panjang_tanah=$request->tanah_panjang;                
                    $pajak_khusus->lebar_tanah=$request->tanah_lebar;
                    $pajak_khusus->panjang_bangunan=$request->bangunan_panjang;                
                    $pajak_khusus->lebar_bangunan=$request->bangunan_lebar;
                    $pajak->save();
                    $pajak_khusus->id=$pajak->id;   
                    $pajak_khusus->save(); 
                }
                else if ($temp != null) {
                    return Redirect::to('tambahpajak');
                }
            
           }           
           return Redirect::to('home');
    }
    public function getKelolaNpwpd(){
        return view('wajibpajak.dinasnpwpd');
    }
}
