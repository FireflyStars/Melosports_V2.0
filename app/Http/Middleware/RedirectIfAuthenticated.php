<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
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
       /*  if (Auth::guard($guard)->check()) {
            return redirect('/home');
        } */

		 /*  if (!Auth::guard($guard)->check()=="admin") {
			Session::flash('fail', 'Invalid credentials!');
            return redirect('/admin');
        } */
		 /*  if (!Auth::guard($guard)->check()=="userAuth") {
			Session::flash('fail', 'Invalid credentials!');
            return redirect('/main');
        } */
        return $next($request);
    }
}
