<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PajakHotel extends Model {

    protected $table = 'ppl_pajak_pajak_hotel';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function pajak()
    {
        return $this->belongsTo('Pajak', 'id');
    }

}
