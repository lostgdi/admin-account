<?php namespace Lostgdi\Admin\App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateAdminAccountManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        if( Auth::user()->level!=0 ){
            return redirect()->guest('/admin_account/welcome');
        }

        return $next($request);
    }
}
