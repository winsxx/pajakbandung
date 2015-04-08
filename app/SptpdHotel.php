<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SptpdHotel extends Model {

    protected $table = 'sptpd_hotel';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function sptpd(){
        return $this->belongsTo('\App\Sptpd');
    }

}
