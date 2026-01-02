<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $keyType = 'string';
    protected $primaryKey = 'username';
    protected $hidden = [
        'password'
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

    public function getAuthIdentifier()
    {
        return $this->username;
    }
}
