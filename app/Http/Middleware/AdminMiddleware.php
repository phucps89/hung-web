<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!in_array($request->route()->getName(), [ADMIN_LOGIN, ADMIN_LOGIN_POST])){
            if(!Auth::guard(AUTH_GUARD_USER)->check()){
                return redirect()->route(ADMIN_LOGIN);
            }
        }
        return $next($request);
    }
}
