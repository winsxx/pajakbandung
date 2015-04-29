<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class IzinUsaha extends Model {

    protected $table = 'ppl_pajak_izin_usaha';
    protected $primaryKey = 'no_izin';
    public $timestamps = false;

    public function Penduduk() {
    	return $this->belongsTo('\App\Penduduk','no_ktp_pemilik');
    }

    public function WajibPajak() {
    	return $this->belongsTo('\App\WajibPajak','no_izin','no_izin_usaha');
    }
}
