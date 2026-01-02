<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InstructorSocial extends Model
{
    protected $table = 'instructor_socials';
    protected $primaryKey = 'id';

    protected $guarded = [];

    public function instructor(): BelongsTo
    {
        return $this->belongsTo(Instructor::class, 'user_id', 'instructor_id');
    }

    public function getCreatedAtAttribute($value): string
    {
        return Carbon::parse($value)->format('d-m-Y h:i a');
    }

    public function getUpdatedAtAttribute($value): string
    {
        return Carbon::parse($value)->format('d-m-Y h:i a');
    }
}
