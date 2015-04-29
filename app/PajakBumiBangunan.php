<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PajakBumiBangunan extends Model {

    protected $table = 'ppl_pajak_pajak_bumi_bangunan';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function pajak()
    {
        return $this->belongsTo('\App\Pajak', 'id');
    }

}