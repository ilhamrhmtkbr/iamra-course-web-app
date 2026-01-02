<?php

namespace Domain\Shared\Models;

use Carbon\Carbon;
use Domain\Shared\Enum\UserRole;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    protected $table = 'users';
    protected $keyType = 'string';
    protected $primaryKey = 'username';
    protected $casts = [
        'role' => UserRole::class,
    ];
    protected $hidden = [
        'password',
    ];
    protected $guarded = [];
    public $incrementing = false;

    public function getCreatedAtAttribute($value): string
    {
        return Carbon::parse($value)->format('d-m-Y h:i a');
    }

    public function getUpdatedAtAttribute($value): string
    {
        return Carbon::parse($value)->format('d-m-Y h:i a');
    }

    public function student(): HasOne
    {
        return $this->hasOne(Student::class, 'user_id', 'username');
    }

    public function instructor(): HasOne
    {
        return $this->hasOne(Instructor::class, 'user_id', 'username');
    }

    public function likedCourses(): BelongsToMany
    {
        return $this->belongsToMany(InstructorCourse::class, 'instructor_courses_like', 'user_id', 'instructor_course_id')
            ->withPivot('created_at')
            ->using(InstructorCourseLike::class);
    }

    public function likedCoursesLastWeek(): BelongsToMany
    {
        return $this->belongsToMany(InstructorCourse::class, 'instructor_courses_like', 'user_id', 'instructor_course_id')
            ->withPivot('created_at')
            ->wherePivot('created_at', '>=', now()->subDays(7))
            ->using(InstructorCourseLike::class);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
        return [];
    }
}
