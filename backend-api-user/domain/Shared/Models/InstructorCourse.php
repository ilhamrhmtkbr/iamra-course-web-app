<?php

namespace Domain\Shared\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class InstructorCourse extends Model
{
    protected $table = 'instructor_courses';
    protected $keyType = 'string';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $incrementing = false;

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
        return $this->belongsTo(Instructor::class, 'instructor_id', 'user_id');
    }

    public function likedByUser(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'instructor_courses_like',
            'instructor_course_id',
            'user_id'
        )
            ->withPivot('created_at')
            ->using(InstructorCourseLike::class);
    }

    public function scopePublic(Builder $query): Builder
    {
        return $query->where('visibility', 'public')->select([
            'id',
            'title',
            'description',
            'image',
            'price',
            'level',
            'status',
            'notes',
            'requirements',
            'created_at',
            'updated_at'
        ]);
    }

}
