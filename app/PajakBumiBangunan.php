<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PajakBumiBangunan extends Model {

    protected $table = 'pajak_bumi_bangunan';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function pajak()
    {
        return $this->belongsTo('Pajak', 'id');
    }

}