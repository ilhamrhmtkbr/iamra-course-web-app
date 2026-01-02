<?php

namespace Tests\utils;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Repository
{
    const USERNAME = 'johndoe';
    const PASSWORD = 'John123!';
    const STUDENT_CERT_ID = '550e8400-e29b-41d4-a716-446655440000';
    const STUDENT_ORDER_ID = '93ca88t635ba5';

    const INSTRUCTOR_USERNAME = 'clark';
    const INSTRUCTOR_PASSWORD = 'Clark123!';

    const INSTRUCTOR_COURSE_ID = '550e8400-e29b-41d4-a716-446655440000';

    public static function insertUser(): void
    {
        DB::connection('mysql')
            ->table('users')
            ->insert([
                'username' => self::USERNAME,
                'password' => Hash::make(self::PASSWORD),
                'role' => 'student',
                'email' => self::USERNAME . '@gmail.com',
                'email_verified_at' => now()
            ]);
    }

    public static function deleteUser(): void
    {
        DB::connection('mysql')
            ->table('users')
            ->where('username', self::USERNAME)
            ->delete();
    }

    public static function insertStudent(): void
    {
        self::insertUser();

        DB::connection('mysql')
            ->table('students')
            ->insert([
                'user_id' => self::USERNAME
            ]);
    }

    public static function deleteStudent(): void
    {
        DB::connection('mysql')
            ->table('students')
            ->where('user_id', self::USERNAME)
            ->delete();
    }

    public static function insertStudentBuyCourse(): void
    {
        DB::connection('mysql')
            ->table('instructor_earnings')
            ->insert([
                'order_id' => self::STUDENT_ORDER_ID,
                'instructor_course_id' => self::INSTRUCTOR_COURSE_ID,
                'student_id' => self::USERNAME,
                'amount' => 17500,
                'status' => 'settlement'
            ]);
    }

    public static function deleteStudentBuyCourse(): void
    {
        DB::connection('mysql')
            ->table('instructor_earnings')
            ->where('student_id', self::USERNAME)
            ->delete();
    }

    public static function insertInstructor(): void
    {
        DB::connection('mysql')
            ->table('users')
            ->insert([
                'username' => self::INSTRUCTOR_USERNAME,
                'password' => self::INSTRUCTOR_PASSWORD
            ]);

        DB::connection('mysql')
            ->table('instructors')
            ->insert([
                'user_id' => self::INSTRUCTOR_USERNAME
            ]);
    }

    public static function deleteInstructor(): void
    {
        DB::connection('mysql')
            ->table('instructors')
            ->where('user_id', self::INSTRUCTOR_USERNAME)
            ->delete();

        DB::connection('mysql')
            ->table('users')
            ->where('username', self::INSTRUCTOR_USERNAME)
            ->delete();
    }

    public static function insertCourse(): void
    {
        self::insertInstructor();

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

    public static function deleteCourses(): void
    {
        DB::connection('mysql')
            ->table('instructor_courses')
            ->where('instructor_id', '=', self::USERNAME)
            ->delete();
    }

    public static function insertSections(): void
    {
        self::insertCourse();

        DB::connection('mysql')
            ->table('instructor_sections')
            ->insert([
                'id' => 999,
                'instructor_course_id' => self::INSTRUCTOR_COURSE_ID,
                'title' => 'title1',
                'order_in_course' => 1
            ]);
    }

    public static function deleteSections(): void
    {
        DB::connection('mysql')
            ->table('instructor_sections')
            ->where('instructor_course_id', self::INSTRUCTOR_COURSE_ID)
            ->delete();
    }

    public static function insertLessons(): void
    {
        self::insertSections();

        DB::connection('mysql')
            ->table('instructor_lessons')
            ->insert([
                'instructor_section_id' => 999,
                'title' => 'title1',
                'description' => 'description1',
                'code' => 'code1',
                'order_in_section' => 1
            ]);
    }

    public static function deleteLessons(): void
    {
        DB::connection('mysql')
            ->table('instructor_lessons')
            ->where('instructor_section_id', 999)
            ->delete();
    }

    public static function initData(): void
    {
        self::insertStudent();
        self::insertLessons();
    }

    public static function clearData(): void
    {
        self::deleteLessons();
        self::deleteSections();
        self::deleteCourses();
        self::deleteInstructor();
        self::deleteStudent();
        self::deleteUser();
    }

    public static function insertCart(): void
    {
        DB::connection('mysql')
            ->table('student_carts')
            ->insert([
                'id' => 999,
                'student_id' => self::USERNAME,
                'instructor_course_id' => self::INSTRUCTOR_COURSE_ID
            ]);
    }

    public static function deleteCart(): void
    {
        DB::connection('mysql')
            ->table('student_carts')
            ->where('student_id', self::USERNAME)
            ->delete();
    }

    public static function insertCertificates(): void
    {
        DB::connection('mysql')
            ->table('student_certificates')
            ->insert([
                'id' => self::STUDENT_CERT_ID,
                'student_id' => self::USERNAME,
                'instructor_course_id' => self::INSTRUCTOR_COURSE_ID
            ]);
    }

    public static function deleteCertificates(): void
    {
        DB::connection('mysql')
            ->table('student_certificates')
            ->where('student_id', self::USERNAME)
            ->delete();
    }

    public static function insertProgress(): void
    {
        DB::connection('mysql')
            ->table('student_course_progresses')
            ->insert([
                'student_id' => self::USERNAME,
                'instructor_course_id' => self::INSTRUCTOR_COURSE_ID,
                'sections' => json_encode([999 => 'title1'])
            ]);
    }

    public static function deleteProgress(): void
    {
        DB::connection('mysql')
            ->table('student_course_progresses')
            ->where('student_id', self::USERNAME)
            ->delete();
    }

    public static function insertQuestions(string $param): void
    {
        DB::connection('mysql')
            ->table('student_questions')
            ->insert([
                'id' => 999,
                'student_id' => self::USERNAME,
                'instructor_course_id' => self::INSTRUCTOR_COURSE_ID,
                'question' => $param
            ]);
    }

    public static function deleteQuestions(): void
    {
        DB::connection('mysql')
            ->table('student_questions')
            ->where('student_id', self::USERNAME)
            ->delete();
    }

    public static function insertReviews(): void
    {
        DB::connection('mysql')
            ->table('instructor_course_reviews')
            ->insert([
                'id' => 999,
                'instructor_course_id' => self::INSTRUCTOR_COURSE_ID,
                'student_id' => self::USERNAME,
                'review' => 'review satu',
                'rating' => 9
            ]);
    }

    public static function deleteReviews(): void
    {
        DB::connection('mysql')
            ->table('instructor_course_reviews')
            ->where('student_id', self::USERNAME)
            ->delete();
    }

    public static function insertTransactions(): void
    {
        self::insertStudentBuyCourse();
        DB::connection('mysql')
            ->table('student_transactions')
            ->insert([
                'order_id' => self::STUDENT_ORDER_ID,
                'student_id' => self::USERNAME,
                'instructor_course_id' => self::INSTRUCTOR_COURSE_ID,
                'amount' => 17500,
                'midtrans_data' => json_encode(['transaction' => 'value']),
                'status' => 'settlement'
            ]);
    }

    public static function deleteTransactions(): void
    {
        self::deleteStudentBuyCourse();
        DB::connection('mysql')
            ->table('student_transactions')
            ->where('student_id', self::USERNAME)
            ->delete();
    }
}
