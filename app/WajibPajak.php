<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class WajibPajak extends Model {

	protected $table = 'ppl_pajak_wajib_pajak';
    protected $primaryKey = 'npwpd';
    public $timestamps = false;

    public function penduduk()
    {
        return $this->belongsTo('\App\Penduduk', 'no_ktp_pemilik');
    }

    public function izinUsaha()
    {
        return $this->belongsTo('\App\IzinUsaha','no_izin_usaha');
    }

    public function pajak(){
        return $this->hasMany('\App\Pajak','npwpd_pemilik', 'npwpd');
    }

}
