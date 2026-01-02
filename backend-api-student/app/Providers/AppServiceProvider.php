<?php

namespace App\Providers;

use Domain\Carts\Policies\CartPolicy;
use Domain\Certificates\Policies\CertificatePolicy;
use Domain\Questions\Policies\QuestionPolicy;
use Domain\Shared\Models\StudentCart;
use Domain\Shared\Models\StudentCertificate;
use Domain\Shared\Models\StudentQuestion;
use Domain\Shared\Models\StudentTransaction;
use Domain\Transactions\Policies\TransactionPolicy;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
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

        Gate::policy(StudentCart::class, CartPolicy::class);
        Gate::policy(StudentCertificate::class, CertificatePolicy::class);
        Gate::policy(StudentTransaction::class, TransactionPolicy::class);
        Gate::policy(StudentQuestion::class, QuestionPolicy::class);
    }
}
