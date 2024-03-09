<?php

namespace App\Providers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\User;

// use Illuminate\Support\Facades\Gate;
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
        $this->registerPolicies();

        Gate::define('admin', function (User $user) {
            return $user->is_admin == true;
        });

        // Gate::define('user', function (User $user) {
        //     return $user;
        // });

        // Gate::define('auth', function (User $user) {
        //     return $user->is_admin == false; // Replace with your own logic to determine if user is authenticated
        // });
    
    }
}
