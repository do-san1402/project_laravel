<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;

use App\Models\AdminUser;


class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('hasroles', function($expression) {
            if(session()-> get('admin_id')) {
                $user  = AdminUser::get();
                if($user->hasRoles($expression)) {
                    return true;
                }
            }
            return false;
        }) ;
    }
}
