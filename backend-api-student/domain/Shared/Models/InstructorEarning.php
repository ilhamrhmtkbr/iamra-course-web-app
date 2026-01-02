<?php

namespace Domain\Shared\Models;

use Carbon\Carbon;
use Domain\Shared\Enum\InstructorEarningStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InstructorEarning extends Model
{
    protected $table = 'instructor_earnings';
    protected $primaryKey = 'order_id';
    protected $casts = [
        'status' => InstructorEarningStatus::class
    ];
    protected $keyType = 'string';
    public $incrementing = false;

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

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id', 'user_id');
    }

    public function scopeIsStudentPaid(Builder $query, $studentId, $courseId)
    {
        return $query->where('student_id', $studentId)
            ->where('instructor_course_id', $courseId)
            ->where('status', InstructorEarningStatus::SETTLEMENT->value);
    }
}
