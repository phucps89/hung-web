<?php

namespace App\Http\Middleware;

use App\Entities\Role;
use Closure;

class AdminSitePermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if (app('auth')->guard(AUTH_GUARD_USER)->guest()) {
            throw UnauthorizedException::notLoggedIn();
        }

        $permissions = is_array($permission)
            ? $permission
            : explode('|', $permission);

        $user = app('auth')->guard(AUTH_GUARD_USER)->user();
        if($user->hasAnyRole(Role::ADMIN)){
            return $next($request);
        }
        foreach ($permissions as $permission) {
            if ($user->can($permission)) {
                return $next($request);
            }
        }

        throw UnauthorizedException::forPermissions($permissions);
    }
}
