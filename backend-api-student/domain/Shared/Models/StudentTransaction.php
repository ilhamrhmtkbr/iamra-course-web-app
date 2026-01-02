<?php

namespace Domain\Shared\Models;

use Carbon\Carbon;
use Domain\Shared\Enum\StudentTransactionStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentTransaction extends Model
{
    protected $table = 'student_transactions';
    protected $primaryKey = 'order_id';
    protected $keyType = 'string';
    protected $casts = [
        'status' => StudentTransactionStatus::class
    ];
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

    public function instructorCourseCoupon(): BelongsTo
    {
        return $this->belongsTo(InstructorCourseCoupon::class, 'instructor_course_coupon_id', 'id');
    }
}
