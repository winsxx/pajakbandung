<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SptpdHotel extends Model {

    protected $table = 'sptpd_hotel';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function sptpd(){
        return $this->belongsTo('\App\Sptpd','id','no_sptpd');
    }

    public function totalPendapatan(){
        $total = 0;
        $total += $this->penjualan_kamar;
        $total += $this->penjualan_konsumsi;
        $total += $this->penerimaan_laundry;
        $total += $this->penerimaan_sewa_ruangan;
        $total += $this->penerimaan_service;
        return  $total;
    }

    public function totalPajak(){
        return $this->totalPendapatan()*0.1;
    }

}
