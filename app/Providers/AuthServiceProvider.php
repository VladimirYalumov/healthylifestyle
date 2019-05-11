<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();
        $this->registerPostPolicies();
    }

    public function registerPostPolicies()
    {
        /*Gate::define("create_programm", function($user){
            return $user->hasAcces(["create_programm"]);
        });*/

        Gate::define("create_programm", function($user){
            return $user->hasRole("coach");
        });

    }
}
