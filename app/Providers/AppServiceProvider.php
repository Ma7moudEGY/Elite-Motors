<?php

namespace App\Providers;

use App\Models\Car;
use App\Models\Renting;
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
        Gate::define('update-car', function (User $user, Car $car): bool {
            return $user->id === $car->user_id;
        });

        Gate::define('view-renting', function (User $user, Renting $renting): bool {
            return $user->id === $renting->user_id;
        });

        Gate::define('update-renting', function (User $user, Renting $renting): bool {
            return $user->id === $renting->user_id;
        });

        Gate::define('cancel-renting', function (User $user, Renting $renting): bool {
            return $user->id === $renting->user_id;
        });

        Gate::define('rent-car', function (User $user, Car $car): bool {
            return $user->id !== $car->user_id;
        });
    }
}
