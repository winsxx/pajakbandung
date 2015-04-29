<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use DB;

class Pajak extends Model {

    protected $table = 'pajak';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function wajibPajak()
    {
        return $this->belongsTo('\App\WajibPajak', 'npwpd_pemilik');
    }

    public function kolaborator(){
        return $this->belongsToMany('\App\Penduduk','kolaborator','no_pajak','no_ktp_kolab');
    }

    public function statusPembayaranSspd(){
        $last_sspd = Sspd::where('no_pajak','=',$this->id)->orderBy('no_sspd','DESC')->first();
        $time_now = Carbon::now()->year*12 + Carbon::now()->month;
        if($last_sspd) {
            $time_lastpay = $last_sspd->tahun * 12 + $last_sspd->bulan;
            return $time_lastpay >= $time_now;
        }else {
            return false;
        }
    }

    public function getlatestSkpdPbb(){
        $last_skpd=DB::table('skpd_pbb')->where('no_pajak_pbb','=',$this->id)->orderBy('id','DESC')->first();
        return $last_skpd;
    }

    public function getlatestSkpdkbPbb(){
        $last_skpdkb=DB::table('skpdkb_pbb')->where('no_pajak_pbb','=',$this->id)->orderBy('id','DESC')->first();
        return $last_skpdkb;
    }

    public function getlatestSkpd(){
        $last_skpd=DB::table('sptpd')->where('no_pajak',$this->id)->where('terbit_skpd','=',1)->orderBy('no_sptpd','DESC')->first();
        return $last_skpd;
    }

    public function getlatestSkpdkb(){
        $last_skpdkb=DB::table('sptpd')->where('no_pajak',$this->id)->where('terbit_skpdkb','=',1)->orderBy('no_sptpd','DESC')->first();
        return $last_skpdkb;
    }

    public function Sspd() {
        return $this->hasMany('\App\Sspd','no_pajak');
    }

    public function sspdTerakhir(){
        $last_sspd = Sspd::where('no_pajak','=',$this->id)->orderBy('no_sspd','DESC')->first();
        if($last_sspd) {
            return $last_sspd->tahun;
        }
        else {
            return "0000";
        }
        
    }

}
