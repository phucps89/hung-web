<?php

namespace App\Providers;

use App\Entities\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        Blade::if('permission', function ($arrPermission, $guard) {
//            $permission = implode('|', $arrPermission);
//            dd($arrPermission);
            $user = auth('user')->user();
            if ($user->hasRole(Role::ADMIN)) {
                return true;
            } else {
                if ($user->hasAnyPermission($arrPermission)) {
                    return true;
                }
                return false;
            }
        });
    }
}
