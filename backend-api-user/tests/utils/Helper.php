<?php

namespace Tests\utils;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Helper
{
    public const USERNAME = 'juggernaut';
    public const PASSWORD = 'Juggern4ut!';

    public static function insertUser(): void
    {
        DB::connection('mysql')
            ->table('users')
            ->insert([
                'username' => self::USERNAME,
                'password' => Hash::make(self::PASSWORD)
            ]);
    }

    public static function deleteUser(?string $param = null): void
    {
        $username = $param ?: self::USERNAME; // fallback kalau kosong atau null
        DB::connection('mysql')
            ->table('users')
            ->where('username', '=', $username)
            ->delete();
    }
}
