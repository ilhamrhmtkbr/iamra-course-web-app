<?php

namespace Domain\Shared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'user_id';
    protected $keyType = 'string';
    protected $guarded = [];
    public $incrementing = false;
    public $timestamps = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'username');
    }

    public function questions(): HasMany
    {
        return $this->hasMany(StudentQuestion::class, 'student_id', 'user_id');
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(StudentTransaction::class, 'student_id', 'user_id');
    }

    public function courseReviews(): HasMany
    {
        return $this->hasMany(InstructorCourseReview::class, 'student_id', 'user_id');
    }
}
