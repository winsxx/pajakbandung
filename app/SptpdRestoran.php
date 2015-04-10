<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SptpdRestoran extends Model {

    protected $table = 'sptpd_restoran';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function sptpd(){
        return $this->belongsTo('\App\Sptpd');
    }

}
