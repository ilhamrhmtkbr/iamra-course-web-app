<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UsersSeeder::class);
        dump('✅ UserSeeder selesai');

        $this->call(CoursesSeeder::class);
        dump('✅ CoursesSeeder selesai');

        $this->call(SectionsSeeder::class);
        dump('✅ SectionsSeeder selesai');

        $this->call(Lessons1Seeder::class);
        dump('✅ Lessons1Seeder selesai');

        $this->call(Lessons2Seeder::class);
        dump('✅ Lessons2Seeder selesai');

        $this->call(Lessons3Seeder::class);
        dump('✅ Lessons3Seeder selesai');
    }
}
