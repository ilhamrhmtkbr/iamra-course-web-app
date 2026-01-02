<?php

namespace Domain\Shared\Models;

use Carbon\Carbon;
use Domain\Shared\Enum\UserRole;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $keyType = 'string';
    protected $primaryKey = 'username';
    protected $casts = [
        'role' => UserRole::class
    ];
    protected $hidden = [
        'password',
    ];
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

    public function student(): HasOne
    {
        return $this->hasOne(Student::class, 'user_id', 'username');
    }

    public function instructor(): HasOne
    {
        return $this->hasOne(Instructor::class, 'user_id', 'username');
    }

    public function getAuthIdentifier()
    {
        return $this->username;
    }
}
