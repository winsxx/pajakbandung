<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

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
