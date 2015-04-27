<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pajak;
use App\Penduduk;
use App\Sspd;
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
        $temp = Auth::user()->wajibpajak->pajak()->find($id);
        $temp2 = Auth::user()->kolaborasipajak->contains($id);
        if($temp == null && $temp2 == false)
            return redirect('/home');

        $year = Carbon::now()->year;
        $month = Carbon::now()->month;

        $pajak = Pajak::find($id);
        if($pajak->jenis_pajak == 'restoran')
            return view('sptpd.sptpdrestoran',compact('year','month','pajak'));
        else
            return view('sptpd.sptpdhotel',compact('year','month','pajak'));
    }

    public function postSptpdHotel(Request $request, $id){
        $this->validate($request, [
            'bulan' => 'required|integer|between:1,12',
            'tahun' => 'required|integer|between:2000,2200',
            'penjualan_kamar' => 'required|integer',
            'penjualan_makanan' => 'required|integer',
            'laundry' => 'required|integer',
            'sewa_ruangan' => 'required|integer',
            'service' => 'required|integer',
        ]);

        $temp = Auth::user()->wajibpajak->pajak()->find($id);
        $temp2 = Auth::user()->kolaborasipajak->contains($id);
        if($temp == null && $temp2 == false)
            return redirect('/home');

        $sptpd = new Sptpd();
        $sptpd->no_pajak = $id;
        $sptpd->save();

        $sptpdHotel = new SptpdHotel();
        $sptpdHotel->id = $sptpd->no_sptpd;
        $sptpdHotel->penjualan_kamar = $request->penjualan_kamar;
        $sptpdHotel->penjualan_konsumsi = $request->penjualan_makanan;
        $sptpdHotel->penerimaan_laundry = $request->laundry;
        $sptpdHotel->penerimaan_sewa_ruangan = $request->sewa_ruangan;
        $sptpdHotel->penerimaan_service = $request->service;
        $sptpdHotel->tahun = $request->tahun;
        $sptpdHotel->bulan = $request->bulan;
        $sptpdHotel->save();

        return redirect('/pajak/'.$id);

    }

    public function postSptpdRestoran(Request $request, $id){
        $this->validate($request, [
            'bulan' => 'required|integer|between:1,12',
            'tahun' => 'required|integer|between:2000,2200',
            'penjualan_makanan' => 'required|integer',
        ]);

        $temp = Auth::user()->wajibpajak->pajak()->find($id);
        $temp2 = Auth::user()->kolaborasipajak->contains($id);
        if($temp == null && $temp2 == false)
            return redirect('/home');

        $sptpd = new Sptpd();
        $sptpd->no_pajak = $id;
        $sptpd->save();

        $sptpdResto = new SptpdRestoran();
        $sptpdResto->id = $sptpd->no_sptpd;
        $sptpdResto->tahun = $request->tahun;
        $sptpdResto->bulan = $request->bulan;
        $sptpdResto->penjualan = $request->penjualan_makanan;
        $sptpdResto->save();
        return redirect('/pajak/'.$id);
    }

    public function getSspd($id){
        $temp = Auth::user()->wajibpajak->pajak()->find($id);
        $temp2 = Auth::user()->kolaborasipajak->contains($id);
        if($temp == null && $temp2 == false)
            return redirect('/home');

        $year = Carbon::now()->year;
        $month = Carbon::now()->month;

        $pajak = Pajak::find($id);
        return view('sspd.sspd',compact('year','month','pajak'));

    }

    public function postSspd(Request $request, $id){
        $this->validate($request, [
            'bulan' => 'required|integer|between:1,12',
            'tahun' => 'required|integer|between:2000,2200',
            'besar_setoran' => 'required|integer',
        ]);

        $temp = Auth::user()->wajibpajak->pajak()->find($id);
        $temp2 = Auth::user()->kolaborasipajak->contains($id);
        if($temp == null && $temp2 == false)
            return redirect('/home');

        $sspd = new Sspd();
        $sspd->no_pajak = $id;             
        $sspd->tahun = $request->tahun;
        $sspd->bulan = $request->bulan;
        $sspd->besar_setoran = $request->besar_setoran;
        $sspd->save();
        return redirect('/pajak/'.$id);
    }

    public function getKelolaSkpd(){
        return view('skpd.dinasskpd');
    }

    public function getKelolaPajak(){
        $daftarpajak = Pajak::all();
        return view('pajak.dinaspajak', compact('daftarpajak'));
    }

    public function getKelolaSspd(){
        return view('sspd.dinassspd');
    }

    public function getKelolaSkpdkb(){
        return view('skpd.dinasskpdkb');
    }

    public function getKelolaSptpd(){
        return view('sptpd.dinassptpd');
    }

    public function getTutupPajak($id){
        $pajak_terkait = Pajak::findOrFail($id);
        $pajak_terkait->status = "nonaktif";

        $pajak_terkait->save();
        return redirect('kelolapajak');
    }
}
