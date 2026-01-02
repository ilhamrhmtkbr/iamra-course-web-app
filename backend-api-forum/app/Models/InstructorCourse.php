<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

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
}
