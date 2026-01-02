<?php

namespace Domain\Shared\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InstructorAnswer extends Model
{
    protected $table = 'instructor_answers';

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
        return $this->belongsTo(Instructor::class, 'user_id', 'instructor_id');
    }

    public function studentQuestion(): BelongsTo
    {
        return $this->belongsTo(StudentQuestion::class, 'student_question_id', 'id');
    }

    public function scopeGetByInstructor(Builder $builder, User $instructor): Builder
    {
        return $builder->where('instructor_id', $instructor->username)
            ->with(['studentQuestion' => function ($query) {
                $query->select(['id', 'student_id', 'instructor_course_id', 'question'])
                    ->with(['student' => function ($query) {
                        $query->select(['user_id'])->with(['user' => function ($query) {
                            $query->select(['username', 'full_name']);
                        }]);
                    }, 'instructorCourse' => function ($query) {
                        $query->select(['id', 'title']);
                    }]);
            }])
            ->select(['instructor_id', 'student_question_id', 'answer', 'created_at', 'updated_at']);
    }
}
