<?php

namespace Domain\Shared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Instructor extends Model
{
    protected $table = 'instructors';
    protected $keyType = 'string';
    protected $primaryKey = 'user_id';
    protected $guarded = [];
    public $incrementing = false;
    public $timestamps = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'username');
    }

    public function account(): HasOne
    {
        return $this->hasOne(InstructorAccount::class, 'instructor_id', 'user_id');
    }

    public function courses(): HasMany
    {
        return $this->hasMany(InstructorCourse::class, 'instructor_id', 'user_id');
    }

    public function socials(): HasMany
    {
        return $this->hasMany(InstructorSocial::class, 'instructor_id', 'user_id');
    }

    public function answers(): HasMany
    {
        return $this->hasMany(InstructorAnswer::class, 'instructor_id', 'user_id');
    }
}
