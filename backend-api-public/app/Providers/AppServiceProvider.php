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
    public function register(): void
    {
        //
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
