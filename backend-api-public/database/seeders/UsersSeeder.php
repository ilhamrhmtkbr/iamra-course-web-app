<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        DB::connection('mysql')
            ->table('users')
            ->insert([
                ['username' => 'ilhamrhmtkbr',
                    'password' => Hash::make('Ilham123!'),
                    'full_name' => 'Ilham Rahmat Akbar',
                    'email' => 'ilhamrhmtkbr@gmail.com',
                    'email_verified_at' => '2025-03-25',
                    'image' => 'ilham.jpg',
                    'role' => 'instructor',
                    'dob' => '2025-03-25',
                    'address' => 'Senen, Jakarta Pusat'],
                ['username' => 'student',
                    'password' => Hash::make('Student123!'),
                    'full_name' => 'Student Student Student',
                    'email' => 'student@gmail.com',
                    'email_verified_at' => '2025-03-25',
                    'image' => 'student.jpg',
                    'role' => 'student',
                    'dob' => '2025-03-25',
                    'address' => 'Senen, Jakarta Pusat']
            ]);

        DB::connection('mysql')
            ->table('instructors')
            ->insert([
                'user_id' => 'ilhamrhmtkbr'
            ]);

        DB::connection('mysql')
            ->table('students')
            ->insert([
                'user_id' => 'student'
            ]);
    }
}
