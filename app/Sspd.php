<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Sspd extends Model {

	//
    protected $table = 'ppl_pajak_sspd';
    protected $primaryKey = 'no_sspd';
    public $timestamps = false;

    public function pajak(){
        return $this->belongsTo('\App\Pajak','no_pajak');
        //return $this->belongsTo('\App\Pajak','id');
    }

}