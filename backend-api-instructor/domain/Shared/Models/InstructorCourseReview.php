<?php

namespace Domain\Shared\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InstructorCourseReview extends Model
{
    protected $table = 'instructor_course_reviews';
    protected $guarded = ['id'];

    public function getCreatedAtAttribute($value): string
    {
        return Carbon::parse($value)->format('d-m-Y h:i a');
    }

    public function getUpdatedAtAttribute($value): string
    {
        return Carbon::parse($value)->format('d-m-Y h:i a');
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class,'student_id', 'user_id' );
    }

    public function instructorCourse(): BelongsTo
    {
        return $this->belongsTo(InstructorCourse::class,'instructor_course_id', 'id' );
    }
}
