<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SkpdkbPbb extends Model {

    protected $table = 'skpdkb';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function pajak(){
        return $this->belongsTo('\App\PajakBumiBangunan','no_pajak_pbb');
    }

}
