<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class InstructorCourseLike extends Pivot
{
    protected $table = 'instructor_courses_like';
    protected $foreignKey = 'user_id';
    protected $relatedKey = 'instructor_course_id';
    public $timestamps = false;

    public function usesTimestamps(): false
    {
        return false;
    }

    public function getCreatedAtAttribute($value): string
    {
        return Carbon::parse($value)->format('d-m-Y h:i a');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function instructorCourse(): BelongsTo
    {
        return $this->belongsTo(InstructorCourse::class, 'id', 'instructor_course_id');
    }
}
