<?php

namespace App\Providers;

use App\Listeners\WelcomeListener;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Events\PharmacistStatusChanged;
use Illuminate\Support\ServiceProvider;
use App\Listeners\PharmacistStatusChangedListener;

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
        Event::listen(
            Registered::class,
            [WelcomeListener::class, 'handle']
        );

        Event::listen(
            PharmacistStatusChanged::class,
            [PharmacistStatusChangedListener::class, 'handle']
        );
    }
}
