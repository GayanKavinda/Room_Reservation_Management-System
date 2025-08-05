<?php

// app/Providers/AppServiceProvider.php
namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Silber\Bouncer\BouncerFacade as Bouncer;

/**
 * @method void registerPolicies()
 */
class AppServiceProvider extends ServiceProvider
{
    protected $policies = [];

    public function register(): void
    {
        // No changes needed here.
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('manage-users', function ($user) {
            return $user->getAbilities()->contains('name', 'manage-users');
        });

        Gate::define('book-rooms', function ($user) {
            return $user->can('book-rooms');
        });
    }
}