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
        if(SptpdHotel::find($this->no_sptpd))
            return SptpdHotel::find($this->no_sptpd);
        if(SptpdRestoran::find($this->no_sptpd))
            return SptpdRestoran::find($this->no_sptpd);

        return null;
    }

}

