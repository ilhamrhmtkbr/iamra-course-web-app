<?php

namespace Domain\Shared\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InstructorLesson extends Model
{
    protected $table = 'instructor_lessons';

    public function getCreatedAtAttribute($value): string
    {
        return Carbon::parse($value)->format('d-m-Y h:i a');
    }

    public function getUpdatedAtAttribute($value): string
    {
        return Carbon::parse($value)->format('d-m-Y h:i a');
    }

    public function instructorSection(): BelongsTo
    {
        return $this->belongsTo(InstructorSection::class, 'instructor_section_id', 'id');
    }

    public function scopeGetByInstructorId(Builder $builder, int $sectionId, string $instructorId): Builder
    {
        return $builder->whereHas('instructorSection', function ($query) use ($sectionId, $instructorId) {
            $query->whereHas('instructorCourse', function ($query) use ($instructorId) {
                $query->where('instructor_id', $instructorId);
            });
        });
    }
}
