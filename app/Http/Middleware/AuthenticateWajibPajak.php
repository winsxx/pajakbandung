<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class AuthenticateWajibPajak {

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        if(! $this->auth->check()) {
            return redirect(url('/login'));
        }
        if (! $this->auth->user()->hasNpwpd()){
            return redirect(url('/'));
        }
		return $next($request);
	}

}
