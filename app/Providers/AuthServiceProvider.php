<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //$this->registerPolicies();

        Gate::define('manage-users', function($user) {
            //dans la fonction hasanyrole on a dit que le parametre est un tableau
            return $user->hasAnyRole(['','administrateur principal']);
        }); 

        Gate::define('edit-users', function ($user) {
            return $user->isAdminPrincipal();
        });

        Gate::define('delete-users', function ($user) {
            return $user->isAdminPrincipal();
        });
    }
}
