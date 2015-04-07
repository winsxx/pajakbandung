<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Penduduk extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

    protected $primaryKey = 'no_ktp';

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'penduduk';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['no_ktp', 'nama', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    public function kolaborasiPajak(){
        return $this->belongsToMany('\App\Pajak','kolaborator','no_pajak','no_ktp_kolab');
    }

    public function npwpd(){
        return WajibPajak::where('no_ktp_pemilik','=', $this->no_ktp)->get();
    }

    public function hasNpwpd(){
        $temp = $this->npwpd();
        return count($temp)>0;
    }

    public function wajibpajak(){
        return $this->hasOne('\App\WajibPajak','no_ktp_pemilik','no_ktp');
    }

    public function isAdmin(){
        return $this->admin;
    }
}
