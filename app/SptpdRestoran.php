<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SptpdRestoran extends Model {

    protected $table = 'sptpd_restoran';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function sptpd(){
        return $this->belongsTo('\App\Sptpd','id','no_sptpd');
    }

    public function totalPendapatan(){
        return $this->penjualan;
    }

    public function totalPajak(){
        return $this->totalPendapatan()*0.1;
    }

}
