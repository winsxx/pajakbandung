<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class WajibPajak extends Model {

	protected $table = 'wajib_pajak';
    protected $primaryKey = 'npwpd';
    public $timestamps = false;

    public function penduduk()
    {
        return $this->belongsTo('Penduduk', 'no_ktp_pemilik');
    }

    public function izinUsaha()
    {
        return $this->belongsTo('IzinUsaha','no_izin_usaha');
    }

}
