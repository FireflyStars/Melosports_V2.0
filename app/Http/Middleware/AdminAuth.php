<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuth
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
        if (Auth::guard($guard)->guest()) {
			if($request->ajax() || $request->wantsJson()){
				return response('Unauthorized',401);
			}else{
				   return redirect()->guest('/admin');
			}
         
        }
		if ($request->user()->role_id != 1)
        {
            return redirect('admin');
        }

        return $next($request);
    }
}

