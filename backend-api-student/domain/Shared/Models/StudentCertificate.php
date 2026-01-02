<?php

namespace Domain\Shared\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentCertificate extends Model
{
    protected $table = 'student_certificates';
    protected $primaryKey = 'id';
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

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id', 'user_id');
    }

    public function instructorCourse(): BelongsTo
    {
        return $this->belongsTo(InstructorCourse::class, 'instructor_course_id', 'id');
    }

    public function scopeGetByStudentId(Builder $builder, string $studentId): Builder
    {
        return $builder->with(['instructorCourse:id,title',
            'student' => function ($query) {
                $query->select(['user_id'])
                    ->with(['user:username,full_name']);
            }])
            ->where('student_id', $studentId)
            ->select(['id', 'student_id', 'instructor_course_id', 'created_at', 'updated_at']);
    }
}
