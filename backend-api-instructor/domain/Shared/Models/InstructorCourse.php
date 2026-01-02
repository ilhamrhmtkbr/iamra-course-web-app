<?php

namespace Domain\Shared\Models;

use Carbon\Carbon;
use Domain\Shared\Enum\InstructorCourseLevel;
use Domain\Shared\Enum\InstructorCourseStatus;
use Domain\Shared\Enum\InstructorCourseVisibility;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class InstructorCourse extends Model
{
    protected $table = 'instructor_courses';
    protected $keyType = 'string';
    protected $primaryKey = 'id';
    protected $casts = [
        'level' => InstructorCourseLevel::class,
        'status' => InstructorCourseStatus::class,
        'visibility' => InstructorCourseVisibility::class
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

    public function instructor(): BelongsTo
    {
        return $this->belongsTo(Instructor::class, 'instructor_id', 'user_id');
    }

    public function coupon(): HasOne
    {
        return $this->hasOne(InstructorCourseCoupon::class, 'instructor_course_id', 'id');
    }

    public function sections(): HasMany
    {
        return $this->hasMany(InstructorSection::class, 'instructor_course_id', 'id');
    }

    public function earnings(): HasMany
    {
        return $this->hasMany(InstructorEarning::class, 'instructor_course_id', 'id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(InstructorCourseReview::class, 'instructor_course_id', 'id');
    }

    public function likedByUser(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'instructor_courses_like', 'instructor_course_id', 'user_id')
            ->withPivot('created_at')
            ->using(InstructorCourseLike::class);
    }

    public function studentQuestion(): HasMany
    {
        return $this->hasMany(StudentQuestion::class, 'instructor_course_id', 'id');
    }

    public function studentTransaction(): HasMany
    {
        return $this->hasMany(StudentTransaction::class, 'instructor_course_id', 'id');
    }

    public function scopePublic(Builder $query): Builder
    {
        return $query->where('visibility', 'public')->select([
            'id',
            'title',
            'description',
            'image',
            'price',
            'level',
            'status',
            'notes',
            'requirements',
            'created_at',
            'updated_at'
        ]);
    }

}
