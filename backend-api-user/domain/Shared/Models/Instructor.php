<?php

namespace Domain\Shared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
