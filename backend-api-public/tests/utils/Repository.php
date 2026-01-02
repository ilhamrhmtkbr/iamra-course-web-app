<?php

namespace Tests\utils;

use Illuminate\Support\Facades\DB;

class Repository
{
    const USERNAME = 'ironman';
    const COURSE_ID = 'uuid-course-id';

    static function insertUser(): void
    {
        DB::connection('mysql')
            ->table('users')
            ->insert([
                'username' => self::USERNAME,
                'password' => 'Jarvis123!'
            ]);
    }

    static function deleteUser(): void
    {
        DB::connection('mysql')
            ->table('users')
            ->where('username', self::USERNAME)
            ->delete();
    }

    static function insertInstructor(): void
    {
        self::insertUser();

        DB::connection('mysql')
            ->table('instructors')
            ->insert(['user_id' => self::USERNAME]);
    }

    static function deleteInstructor(): void
    {
        DB::connection('mysql')
            ->table('instructors')
            ->where('user_id', self::USERNAME)
            ->delete();
    }

    static function insertStudent(): void
    {
        DB::connection('mysql')
            ->table('students')
            ->insert(['user_id' => self::USERNAME]);
    }

    static function deleteStudent(): void
    {
        DB::connection('mysql')
            ->table('students')
            ->where('user_id', self::USERNAME)
            ->delete();
    }

    static function insertCourse(): void
    {
        self::insertInstructor();

        DB::connection('mysql')
            ->table('instructor_courses')
            ->insert([
                'id' => self::COURSE_ID,
                'instructor_id' => self::USERNAME,
                'title' => 'kursus1',
                'description' => 'description1',
                'price' => 0,
                'image' => 'image1',
                'level' => 'junior',
                'status' => 'free',
                'visibility' => 'public',
                'notes' => 'notes1',
                'requirements' => 'requirements1',
                'editor' => 'php'
            ]);
    }

    static function deleteCourses(): void
    {
        DB::connection('mysql')
            ->table('instructor_courses')
            ->where('instructor_id', '=', self::USERNAME)
            ->delete();
    }

    static function initData(): void
    {
        self::insertCourse();

        DB::connection('mysql')
            ->table('instructor_sections')
            ->insert([
                'instructor_course_id' => self::COURSE_ID,
                'title' => 'title1',
                'order_in_course' => 1
            ]);

        DB::connection('mysql')
            ->table('instructor_sections')
            ->insert([
                'instructor_course_id' => self::COURSE_ID,
                'title' => 'title2',
                'order_in_course' => 2
            ]);
    }

    static function deleteSections(): void
    {
        DB::connection('mysql')
            ->table('instructor_sections')
            ->where('instructor_course_id', '=', 'uuid-course-id')
            ->delete();
    }

    static function clearAllData(): void
    {
        self::deleteSections();
        self::deleteCourses();
        self::deleteInstructor();
        self::deleteUser();
    }
}
