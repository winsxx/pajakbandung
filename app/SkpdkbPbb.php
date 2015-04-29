<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SkpdkbPbb extends Model {

    protected $table = 'ppl_pajak_skpdkb_pbb';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function pajakPbb(){
        return $this->belongsTo('\App\PajakBumiBangunan','no_pajak_pbb');
    }

}
