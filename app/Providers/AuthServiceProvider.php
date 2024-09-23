<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // Your model to policy mappings can go here.
    ];

    /**
     * Register any authentication/authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Register Passport routes
        $this->registerPolicies();
        

        Passport::tokensExpireIn(now()->addDays(15));
        Passport::refreshTokensExpireIn(now()->addDays(30));
    }
}
