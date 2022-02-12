<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('allow-all', function($user){
            return $user->hasPermission('allow-all'); 
         });
        Gate::define('delete-product', function($user){
           return $user->hasPermission('delete-product'); 
        });
        Gate::define('update-product', function($user){
            return $user->hasPermission('pudate-product');
        });
        Gate::define('update-price', function($user){
            return $user->hasPermission('update-price');
        });
        Gate::define('check-orders', function($user){
            return $user->hasPermission('check-orders');
        });
        Gate::define('upload-product', function($user){
            return $user->hasPermission('upload-product');
        });
        Gate::define('stake-holder', function($user){
            return $user->isStakeHolder();
        });
    }
}
