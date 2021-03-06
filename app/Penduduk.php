<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Penduduk extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

    protected $primaryKey = 'nik';

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'ppl_dukcapil_ktp';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['nik', 'nama', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    public function kolaborasiPajak(){
        return $this->belongsToMany('\App\Pajak','ppl_pajak_kolaborator','no_ktp_kolab','no_pajak');
    }

    public function npwpd(){
        return WajibPajak::where('no_ktp_pemilik','=', $this->nik)->get();
    }

    public function IzinUsaha() {
    	return $this->hasMany('\App\IzinUsaha','no_ktp_pemilik');
    }

    public function hasNpwpd(){
        $temp = $this->npwpd();
        return count($temp)>0;
    }

    public function wajibpajak(){
        return $this->hasOne('\App\WajibPajak','no_ktp_pemilik','nik');
    }

    public function isAdmin(){
        return ($this->role == 'dinaspajak');
    }

    public function getAdminAttribute(){
        return ($this->role == 'dinaspajak');
    }

    public function getNoKtpAttribute(){
        return $this->nik;
    }
}
