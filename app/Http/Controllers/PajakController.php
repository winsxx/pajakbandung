<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pajak;
use App\PajakBumiBangunan;
use App\Penduduk;
use App\Skpdkb;
use App\SkpdkbPbb;
use App\SkpdPbb;
use App\Sptpd;
use App\SptpdHotel;
use App\SptpdRestoran;
use App\Sspd;
use App\WajibPajak;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use DB;

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
        if ($pajak->jenis_pajak=='pbb'){
            $skpd=$pajak->getlatestSkpdPbb();
            $skpdkb=$pajak->getlatestSkpdkbPbb();
        }
        else{
            $skpd=$pajak->getlatestSkpd();
            $skpdkb=$pajak->getlatestSkpdkb();
        }
        return view('pajak.menuperpajak', compact('pajak','izin','skpd','skpdkb'));
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
        $sptpd->tahun = $request->tahun;
        $sptpd->bulan = $request->bulan;
        $sptpd->save();

        $sptpdHotel = new SptpdHotel();
        $sptpdHotel->id = $sptpd->no_sptpd;
        $sptpdHotel->penjualan_kamar = $request->penjualan_kamar;
        $sptpdHotel->penjualan_konsumsi = $request->penjualan_makanan;
        $sptpdHotel->penjualan_laundry = $request->laundry;
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
        $sptpd->tahun = $request->tahun;
        $sptpd->bulan = $request->bulan;
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

        $sptpd = Sptpd::where('no_pajak', '=', $id)->where('bulan','=',$request->bulan)->where('tahun','=',$request->tahun)->first();
        $jenis_pajak = Pajak::find($id)->jenis_pajak;
        if($jenis_pajak == "pbb"){
            $skpd = SkpdPbb::where('no_pajak_pbb','=',$id)->where('tahun','=',$request->tahun)->first();
            if($skpd == null){
                $error = ['skpd' => 'SKPD pada tahun '.$request->tahun.' belum diterbitkan'];
                return redirect('/pajak/' . $id . '/sspd')->withErrors($error);
            }
        }else if($sptpd == null) {
            $error = ['sptpd' => 'Tidak ditemukan SPTPD pada bulan '.$request->bulan.' dan tahun '.$request->tahun];
            return redirect('/pajak/' . $id . '/sspd')->withErrors($error);
        }else if ($sptpd->terbit_skpd == false){
            $error = ['skpd' => 'SKPD pada bulan '.$request->bulan.' dan tahun '.$request->tahun.' belum diterbitkan'];
            return redirect('/pajak/' . $id . '/sspd')->withErrors($error);
        }

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
        $listsspd = Sspd::all();
        return view('sspd.dinassspd', compact('listsspd'));
        // $listSspd = Sspd::with('pajak.kolaborator.IzinUsaha')->get();
        // return view('sspd.dinassspd')->with('listsspd',$listSspd);
    }

    public function getKelolaSkpdkb(){
        return view('skpd.dinasskpdkb');
    }

    public function getKelolaSptpd(){
        $daftarSptpd = Sptpd::all();
        return view('sptpd.dinassptpd', compact('daftarSptpd'));
    }

    public function hapusSptpd($id){
        Sptpd::destroy($id);
        return redirect('admin/kelolasptpd');
    }

    public function getKelolaNpwpd(){
        $listNpwpd = WajibPajak::all();
        return view('wajibpajak.dinasnpwpd')->with('listnpwpd',$listNpwpd);
    }

    public function getTutupPajak($id){
        $pajak_terkait = Pajak::findOrFail($id);
        $pajak_terkait->status = "nonaktif";

        $pajak_terkait->save();
        return redirect('admin/kelolapajak');
    }

    public function getAktifkanPajak($id){
        $pajak_terkait = Pajak::findOrFail($id);
        $pajak_terkait->status = "aktif";

        $pajak_terkait->save();
        return redirect('admin/kelolapajak');
    }

    public function getHapusPajak($id){
        Pajak::destroy($id);
        return redirect('admin/kelolapajak');
    }

    public function  getKirimSkpd($id){
        $sptpdTerkait = Sptpd::find($id);
        $sptpdTerkait->terbit_skpd = true;
        $sptpdTerkait->nilai_skpd = $sptpdTerkait->sptpdLengkap()->totalPajak();
        $sptpdTerkait->save();

        Mail::send('emails.skpdmail', array('sptpd'=>$sptpdTerkait), function($message) use($sptpdTerkait) {
            $message->to($sptpdTerkait->pajak->wajibPajak->penduduk->email, $sptpdTerkait->pajak->wajibPajak->penduduk->nama)
                ->subject('Surat Ketetapan Pajak Daerah');
        });

        return redirect('admin/kelolasptpd');
    }

    public function  getKirimSkpdkb($id){
        $sptpdTerkait = Sptpd::find($id);
        if((! $sptpdTerkait->terbit_skpdkb) && $sptpdTerkait->terbit_skpd){
            Mail::send('emails.skpdkbmail', array('sptpd'=>$sptpdTerkait), function($message) use($sptpdTerkait) {
                $message->to($sptpdTerkait->pajak->wajibPajak->penduduk->email, $sptpdTerkait->pajak->wajibPajak->penduduk->nama)
                    ->subject('Surat Ketetapan Pajak Daerah Kurang Bayar');
            });
            $sptpdTerkait->terbit_skpdkb = true;
            $sptpdTerkait->save();
        }

        return redirect('admin/kelolasptpd');
    }

    public function getKirimSkpdkbPbb($id){
        // Bagian ngoding sini
    }

    public function getHapusSspd($id) {
        $sspd = Sspd::findOrFail($id);
        $sspd->delete();
        return redirect('admin/kelolasspd');
    }

    public function getTutupNpwpd($id) {
        $npwpd = WajibPajak::findOrFail($id);
        $npwpd->status = "nonaktif";
        $npwpd->save();
        return redirect('admin/kelolanpwpd');
    }

    public function getHapusNpwpd($id) {
        $npwpd = WajibPajak::findOrFail($id);
        $npwpd->delete();
        return redirect('admin/kelolanpwpd');
    }

    public function genereteAllPbbSkpd(){
        $hargaTanahSatuan = 5000000.0;
        $hargaBangunanSatuan = 5000000.0;
        $biayaPbbMinimal = 12000000.0;
        $daftarPbb = PajakBumiBangunan::all();
        foreach($daftarPbb as $pbb){
            $hargaTanah = ($pbb->panjang_tanah * $pbb->lebar_tanah)*$hargaTanahSatuan;
            $hargaBangunan = ($pbb->panjang_bangunan * $pbb->lebar_bangunan)* $hargaBangunanSatuan;
            $pajak = $hargaTanah + $hargaBangunan - $biayaPbbMinimal;
            if($pajak <0) $pajak = 0;
            $pajak = 0.2 * $pajak;
            $pajak = 0.005 * $pajak;

            $skpdPbb = new SkpdPbb();
            $skpdPbb->no_pajak_pbb = $pbb->id;
            $skpdPbb->tahun = Carbon::now()->year;
            $skpdPbb->biaya = $pajak;
            $skpdPbb->save();

            Mail::send('emails.skpdpbbmail', array('skpd'=>$skpdPbb), function($message) use($skpdPbb) {
                $message->to($skpdPbb->pajakPbb->pajak->wajibPajak->penduduk->email, $skpdPbb->pajakPbb->pajak->wajibPajak->penduduk->nama)
                    ->subject('Surat Ketetapan Pajak Daerah');
            });
        }
        return redirect('admin/kelolapbb');
    }

    public function genereteAllPbbSkpdkb(){
        $year = Carbon::now()->year;

        $daftarSkpdPbb = SkpdPbb::where('tahun','=',$year)->get();
        foreach($daftarSkpdPbb as $skpd){

            $sspd = Sspd::where('no_pajak','=',$skpd->no_pajak_pbb)->where('tahun','=',$skpd->tahun)->first();

            if($sspd == null){
                $skpdkbPbb = new SkpdkbPbb();
                $skpdkbPbb->no_pajak_pbb = $skpd->no_pajak_pbb;
                $skpdkbPbb->tahun = $skpd->tahun;
                $skpdkbPbb->hutang = $skpd->biaya;
                $skpdkbPbb->save();

                Mail::send('emails.skpdkbpbbmail', array('skpdkb'=>$skpdkbPbb), function($message) use($skpdkbPbb) {
                    $message->to($skpdkbPbb->pajakPbb->pajak->wajibPajak->penduduk->email, $skpdkbPbb->pajakPbb->pajak->wajibPajak->penduduk->nama)
                        ->subject('Surat Ketetapan Pajak Daerah Kurang Bayar');
                });
            }
        }

        return redirect('admin/kelolapbb');
    }

    public function getKelolaPbb(){
        $daftarpbb = Pajak::where('jenis_pajak','=','pbb')->get();
        return view('pajak.dinaspbb', compact('daftarpbb'));
    }

    public function showSkpd($id,$skpd_id){         
        $pajak=Pajak::findOrFail($id);
        if ($pajak != null){
            if ( $pajak->jenis_pajak == 'pbb'){
                $skpd=SkpdPbb::findOrFail($skpd_id);
            }
            else if ( $pajak->jenis_pajak != 'pbb'){
                $skpd=Sptpd::findOrFail($skpd_id);
            }
            return view('skpd.skpd',compact('pajak','skpd'));
        }
        return Redirect('home');        
    }

    public function showSkpdkb($id,$skpdkb_id){
        $pajak=Pajak::findOrFail($id);
        if ($pajak != null){
            if ( $pajak->jenis_pajak == 'pbb'){
                $skpdkb=SkpdkbPbb::findOrFail($skpdkb_id);
            }
            else if ( $pajak->jenis_pajak != 'pbb'){
                $skpdkb=Sptpd::findOrFail($skpdkb_id);
            }
            return view('skpd.skpdkb',compact('pajak','skpdkb'));
        }
        return Redirect('home');        
    }

    public function showSkpdAll($id){
        $pajak=Pajak::findOrFail($id);
        if ($pajak != null){
            if ($pajak->jenis_pajak=='pbb'){
                $daftarskpd=SkpdPbb::where('no_pajak_pbb','=',$id)->orderBy('id','DESC')->get();
                $daftarskpdkb=SkpdkbPbb::where('no_pajak_pbb','=',$id)->orderBy('id','DESC')->get();
            }
            else{
                $daftarskpd=Sptpd::where('no_pajak',$id)->where('terbit_skpd','=',1)->orderBy('no_sptpd','DESC')->get();
                $daftarskpdkb=Sptpd::where('no_pajak',$id)->where('terbit_skpdkb','=',1)->orderBy('no_sptpd','DESC')->get();
            }
        }
        return view('skpd.listskpd',compact('pajak','daftarskpd','daftarskpdkb'));
    }

}
