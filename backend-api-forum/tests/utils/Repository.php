<?php

namespace Tests\utils;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Repository
{
    const CUSTOM_ID = 999;
    const CUSTOM_UUID = '120r8412-e29b-41d4-a716-346655441234';

    const USER_USERNAME = 'userr';
    const USER_PASSWORD = 'User123!';

    const INSTRUCTOR_USERNAME = 'juggernaut';
    const INSTRUCTOR_PASSWORD = 'Juggernaut123!';
    const INSTRUCTOR_COURSE_ID = '550e8400-e29b-41d4-a716-446655440000';

    const STUDENT_USERNAME = 'mirana';
    const STUDENT_PASSWORD = 'Mirana123!';
    const STUDENT_ORDER_ID = '93ca88t635ba5';

    public static function insertUser(): void
    {
        DB::connection('mysql')
            ->table('users')
            ->insert([
                'username' => self::USER_USERNAME,
                'password' => Hash::make(self::USER_PASSWORD),
                'email' => 'user123@gmail.com',
                'email_verified_at' => now(),
                'role' => 'user'
            ]);
    }

    public static function deleteUser(): void
    {
        DB::connection('mysql')
            ->table('users')
            ->where('username', 'userr')
            ->delete();
    }

    public static function insertUserForInstructor(): void
    {
        DB::connection('mysql')
            ->table('users')
            ->insert([
                'username' => self::INSTRUCTOR_USERNAME,
                'password' => Hash::make(self::INSTRUCTOR_PASSWORD),
                'email' => self::INSTRUCTOR_USERNAME . '@gmail.com',
                'email_verified_at' => now(),
                'role' => 'instructor'
            ]);
    }

    public static function deleteUserForInstructor(): void
    {
        DB::connection('mysql')
            ->table('users')
            ->where('username', self::INSTRUCTOR_USERNAME)
            ->delete();
    }

    public static function insertUserForStudent(): void
    {
        DB::connection('mysql')
            ->table('users')
            ->insert([
                'username' => self::STUDENT_USERNAME,
                'password' => Hash::make(self::STUDENT_PASSWORD),
                'email' => self::STUDENT_USERNAME . '@gmail.com',
                'email_verified_at' => now(),
                'role' => 'student'
            ]);
    }

    public static function deleteUserForStudent(): void
    {
        DB::connection('mysql')
            ->table('users')
            ->where('username', self::STUDENT_USERNAME)
            ->delete();
    }

    public static function insertInstructor(): void
    {
        self::insertUserForInstructor();
        DB::connection('mysql')
            ->table('instructors')
            ->insert([
                'user_id' => self::INSTRUCTOR_USERNAME
            ]);
    }

    public static function deleteInstructor(): void
    {
        self::deleteUserForInstructor();
        DB::connection('mysql')
            ->table('instructors')
            ->where('user_id', self::INSTRUCTOR_USERNAME)
            ->delete();
    }

    public static function insertStudent(): void
    {
        self::insertUserForStudent();
        DB::connection('mysql')
            ->table('students')
            ->insert([
                'user_id' => self::STUDENT_USERNAME
            ]);
    }

    public static function deleteStudent(): void
    {
        self::deleteUserForStudent();
        DB::connection('mysql')
            ->table('students')
            ->where('user_id', self::STUDENT_USERNAME)
            ->delete();
    }

    public static function insertCourse(): void
    {
        DB::connection('mysql')
            ->table('instructor_courses')
            ->insert([
                'id' => self::INSTRUCTOR_COURSE_ID,
                'instructor_id' => self::INSTRUCTOR_USERNAME,
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

    public static function deleteCourse(): void
    {
        DB::connection('mysql')
            ->table('instructor_courses')
            ->where('instructor_id', self::INSTRUCTOR_USERNAME)
            ->delete();
    }

    public static function insertStudentBuyCourse(): void
    {
        self::insertCourse();
        DB::connection('mysql')
            ->table('instructor_earnings')
            ->insert([
                'order_id' => self::STUDENT_ORDER_ID,
                'instructor_course_id' => self::INSTRUCTOR_COURSE_ID,
                'student_id' => self::STUDENT_USERNAME,
                'amount' => 17500,
                'status' => 'settlement'
            ]);
    }

    public static function deleteStudentBuyCourse(): void
    {
        self::deleteCourse();
        DB::connection('mysql')
            ->table('instructor_earnings')
            ->where('student_id', self::STUDENT_USERNAME)
            ->delete();
    }

    public static function insertStudentTransactions(): void
    {
        self::insertStudentBuyCourse();
        DB::connection('mysql')
            ->table('student_transactions')
            ->insert([
                'order_id' => self::STUDENT_ORDER_ID,
                'student_id' => self::STUDENT_USERNAME,
                'instructor_course_id' => self::INSTRUCTOR_COURSE_ID,
                'amount' => 17500,
                'midtrans_data' => json_encode(['transaction' => 'value']),
                'status' => 'settlement'
            ]);
    }

    public static function deleteStudentTransactions(): void
    {
        self::deleteStudentBuyCourse();
        DB::connection('mysql')
            ->table('student_transactions')
            ->where('student_id', self::STUDENT_USERNAME)
            ->delete();
    }
}
