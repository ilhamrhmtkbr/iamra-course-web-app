<?php

namespace Domain\Shared\Models;

use Domain\Shared\Enum\StudentCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'user_id';
    protected $keyType = 'string';
    protected $guarded = [];
    protected $casts = [
        'category' => StudentCategory::class
    ];
    public $incrementing = false;
    public $timestamps = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'username');
    }
}
