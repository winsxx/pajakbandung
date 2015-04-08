<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Sptpd extends Model {

    protected $table = 'sptpd';
    protected $primaryKey = 'no_sptpd';
    public $timestamps = false;

    public function pajak(){
        return $this->belongsTo('\App\Pajak','no_pajak');
    }

    public function sptpdLengkap(){
        if($this->pajak->jenis_pajak == 'hotel')
            return $this->hasOne('\App\SptpdHotel','id','no_sptpd');
        if($this->pajak->jenis_pajak == 'restoran')
            return $this->hasOne('\App\SptpdRestoran','id','no_sptpd');

        return null;
    }

}

