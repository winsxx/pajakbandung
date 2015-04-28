<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class IzinUsaha extends Model {

    protected $table = 'izin_usaha';
    protected $primaryKey = 'no_izin';
    public $timestamps = false;

    public function Penduduk() {
    	return $this->belongsTo('\App\Penduduk','no_ktp_pemilik');
    }
}
