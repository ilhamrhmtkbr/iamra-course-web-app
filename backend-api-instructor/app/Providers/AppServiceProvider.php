<?php

namespace App\Providers;

use Domain\Account\Policies\InstructorAccountPolicy;
use Domain\Answers\Policies\InstructorAnswerPolicy;
use Domain\Coupons\Policies\InstructorCourseCouponPolicy;
use Domain\Courses\Policies\InstructorCoursePolicy;
use Domain\Courses\Policies\InstructorCourseReviewPolicy;
use Domain\Lessons\Policies\InstructorLessonPolicy;
use Domain\Sections\Policies\InstructorSectionPolicy;
use Domain\Shared\Models\InstructorAccount;
use Domain\Shared\Models\InstructorAnswer;
use Domain\Shared\Models\InstructorCourse;
use Domain\Shared\Models\InstructorCourseCoupon;
use Domain\Shared\Models\InstructorCourseReview;
use Domain\Shared\Models\InstructorLesson;
use Domain\Shared\Models\InstructorSection;
use Domain\Shared\Models\InstructorSocial;
use Domain\Socials\Policies\InstructorSocialPolicy;
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
        Gate::policy(InstructorAccount::class, InstructorAccountPolicy::class);
        Gate::policy(InstructorAnswer::class, InstructorAnswerPolicy::class);
        Gate::policy(InstructorCourse::class, InstructorCoursePolicy::class);
        Gate::policy(InstructorCourseCoupon::class, InstructorCourseCouponPolicy::class);
        Gate::policy(InstructorCourseReview::class, InstructorCourseReviewPolicy::class);
        Gate::policy(InstructorLesson::class, InstructorLessonPolicy::class);
        Gate::policy(InstructorSection::class, InstructorSectionPolicy::class);
        Gate::policy(InstructorSocial::class, InstructorSocialPolicy::class);

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
