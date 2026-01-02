<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        if ($this->app->environment('local')) {
            if (class_exists(\App\Providers\HorizonServiceProvider::class)) {
                $this->app->register(\App\Providers\HorizonServiceProvider::class);
            }
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->app->environment('testing')) {
            RateLimiter::for('custom_limiter', function () {
                return Limit::none();
            });
        } else {
            RateLimiter::for('custom_limiter', function (Request $request) {
                return Limit::perMinute(60)->by($request->ip())
                    ->response(function (Request $request, array $headers) {
                        return response()->json(['message' => 'Custom Too Many Requests'], 429, $headers);
                    });
            });
        }
    }
}
