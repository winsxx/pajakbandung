<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Auth;

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
        return $this->belongsToMany('Pajak','kolaborator','no_ktp','no_ktp_kolab');
    }

    public function npwpd(){
        return WajibPajak::where('no_ktp_pemilik','=', Auth::user()->no_ktp);
    }

    public function hasNpwpd(){
        return (npwpd() != null);
    }
}
