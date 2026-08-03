<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
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
        // Force HTTPS URLs in production so assets are never blocked as mixed
        // content behind a TLS-terminating proxy (Render, Railway, etc.).
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
