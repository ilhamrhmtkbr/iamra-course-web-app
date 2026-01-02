<?php

namespace Domain\Shared\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class InstructorCourseCoupon extends Model
{
    protected $table = 'instructor_courses_coupons';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = [
        'discount', 'max_redemptions', 'expiry_date', 'created_at', 'updated_at'
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

    public function instructorCourse(): BelongsTo
    {
        return $this->belongsTo(InstructorCourse::class, 'instructor_course_id', 'id');
    }

    public function studentTransaction(): HasOne
    {
        return $this->hasOne(StudentTransaction::class, 'instructor_course_coupon_id', 'id');
    }
}
