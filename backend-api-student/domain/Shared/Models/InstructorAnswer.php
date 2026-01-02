<?php

namespace Domain\Shared\Models;

use Carbon\Carbon;
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
}
