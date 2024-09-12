<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::before(function (User $user) {
            if ($user->permission === 'SECRETARY')
                return true;
        });

        Gate::define('assistant', function(User $user) {
            return $user->permission === 'ASSISTANT';
        });

        Gate::define('register', function(User $user) {
            return $user->permission === 'REGISTER';
        });

        Gate::define('secretary', function(User $user) {
            return $user->permission === 'SECRETARY';
        });
    }
}
