<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Sptpd extends Model {

    protected $table = 'ppl_pajak_sptpd';
    protected $primaryKey = 'no_sptpd';
    public $timestamps = false;

    public function pajak(){
        return $this->belongsTo('\App\Pajak','no_pajak');
    }

    public function sptpdLengkap(){
        if(SptpdHotel::find($this->no_sptpd))
            return SptpdHotel::find($this->no_sptpd);
        if(SptpdRestoran::find($this->no_sptpd))
            return SptpdRestoran::find($this->no_sptpd);

        return null;
    }

    public function statusSspdPerSptpd(){
        $pajakTerkait = $this->pajak;
        $sptpdLengkap = $this->sptpdLengkap();

        if($sptpdLengkap != null) {
            $bulan = $sptpdLengkap->bulan;
            $tahun = $sptpdLengkap->tahun;
            $sspdTerkait = Sspd::where('no_pajak', '=', $pajakTerkait->id)->where('bulan', '=', $bulan)->where('tahun', '=', $tahun)->first();
            return $sspdTerkait;
            if ($sspdTerkait == null) {
                return false;
            } else {
                return true;
            }
        }
    }

}

