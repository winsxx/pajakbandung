<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pajak extends Model {

    protected $table = 'pajak';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function wajibPajak()
    {
        return $this->belongsTo('WajibPajak', 'npwpd_pemilik');
    }

    public function collaborator(){
        return $this->belongsToMany('Penduduk','kolaborator','id','no_pajak');
    }

}
