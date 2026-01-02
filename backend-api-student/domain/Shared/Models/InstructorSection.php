<?php

namespace Domain\Shared\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InstructorSection extends Model
{
    protected $table = 'instructor_sections';

    public function getCreatedAtAttribute($value): string
    {
        return Carbon::parse($value)->format('d-m-Y h:i a');
    }

    public function getUpdatedAtAttribute($value): string
    {
        return Carbon::parse($value)->format('d-m-Y h:i a');
    }

    public function instructorCourse(): BelongsTo
    {
        return $this->belongsTo(InstructorCourse::class, 'instructor_course_id', 'id');
    }

    public function instructorLesson(): HasMany
    {
        return $this->hasMany(InstructorLesson::class, 'instructor_section_id', 'id');
    }

    public function studentCourseProgress(): HasMany
    {
        return $this->hasMany(StudentCourseProgress::class, 'instructor_section_id', 'id');
    }
}
