<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Skpdkb extends Model {

    protected $table = 'skpdkb';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function pajak(){
        return $this->belongsTo('\App\Pajak','no_pajak');
    }

}
