<?php

namespace Domain\Shared\Models;

use Carbon\Carbon;
use Domain\Shared\Enum\InstructorCourseEditor;
use Domain\Shared\Enum\InstructorCourseLevel;
use Domain\Shared\Enum\InstructorCourseStatus;
use Domain\Shared\Enum\InstructorCourseVisibility;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
        'visibility' => InstructorCourseVisibility::class,
        'editor' => InstructorCourseEditor::class
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

    public function reviews(): HasMany
    {
        return $this->hasMany(InstructorCourseReview::class, 'instructor_course_id', 'id');
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
