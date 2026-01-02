<?php

namespace Tests\utils;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Repository
{
    const CUSTOM_ID = 999;
    const CUSTOM_UUID = '120r8412-e29b-41d4-a716-346655441234';

    const INSTRUCTOR_USERNAME = 'juggernaut';
    const INSTRUCTOR_PASSWORD = 'Juggernaut123!';
    const INSTRUCTOR_COURSE_ID = '550e8400-e29b-41d4-a716-446655440000';

    const INSTRUCTOR_ACCOUNT_ID = '123321123';
    const INSTRUCTOR_ACCOUNT_BANK = 'agris';
    const INSTRUCTOR_ACCOUNT_ALIAS_NAME = 'juggernautAlias123';

    const STUDENT_USERNAME = 'mirana';
    const STUDENT_PASSWORD = 'Mirana123!';
    const STUDENT_ORDER_ID = '93ca88t635ba5';

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

    public static function insertAccounts(): void
    {
        DB::connection('mysql')
            ->table('instructor_accounts')
            ->insert([
                'id' => self::INSTRUCTOR_COURSE_ID,
                'instructor_id' => self::INSTRUCTOR_USERNAME,
                'account_id' => self::INSTRUCTOR_ACCOUNT_ID,
                'bank_name' => self::INSTRUCTOR_ACCOUNT_BANK,
                'alias_name' => self::INSTRUCTOR_ACCOUNT_ALIAS_NAME
            ]);
    }

    public static function deleteAccounts(): void
    {
        DB::connection('mysql')
            ->table('instructor_accounts')
            ->where('instructor_id', self::INSTRUCTOR_USERNAME)
            ->delete();
    }

    public static function insertQuestion(): void
    {
        self::insertCourse();
        DB::connection('mysql')
            ->table('student_questions')
            ->insert([
                'id' => self::CUSTOM_ID,
                'student_id' => self::STUDENT_USERNAME,
                'instructor_course_id' => self::INSTRUCTOR_COURSE_ID,
                'question' => 'bbbbbbbbb?'
            ]);
    }

    public static function deleteQuestion(): void
    {
        DB::connection('mysql')
            ->table('student_questions')
            ->where('student_id', self::STUDENT_USERNAME)
            ->delete();
    }

    public static function insertAnswers(): void
    {
        self::insertQuestion();
        DB::connection('mysql')
            ->table('instructor_answers')
            ->insert([
                'id' => self::CUSTOM_ID,
                'instructor_id' => self::INSTRUCTOR_USERNAME,
                'student_question_id' => self::CUSTOM_ID,
                'answer' => 'aaaaaaaaaa'
            ]);
    }

    public static function deleteAnswers(): void
    {
        DB::connection('mysql')
            ->table('instructor_answers')
            ->where('instructor_id', self::INSTRUCTOR_USERNAME)
            ->delete();
        self::deleteQuestion();
        self::deleteCourse();
    }

    public static function insertCourseReviews(): void
    {
        self::insertCourse();
        DB::connection('mysql')
            ->table('instructor_course_reviews')
            ->insert([
                'id' => self::CUSTOM_ID,
                'instructor_course_id' => self::INSTRUCTOR_COURSE_ID,
                'student_id' => self::STUDENT_USERNAME,
                'review' => 'review aaa',
                'rating' => 9
            ]);
    }

    public static function deleteCourseReviews(): void
    {
        self::deleteCourse();
        DB::connection('mysql')
            ->table('instructor_course_reviews')
            ->where('instructor_course_id', self::INSTRUCTOR_COURSE_ID)
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

    public static function insertCourseLikes(): void
    {
        self::insertCourse();
        DB::connection('mysql')
            ->table('instructor_courses_like')
            ->insert([
                'instructor_course_id' => self::INSTRUCTOR_COURSE_ID,
                'user_id' => self::STUDENT_USERNAME
            ]);

        DB::connection('mysql')
            ->table('instructor_courses_like')
            ->insert([
                'instructor_course_id' => self::INSTRUCTOR_COURSE_ID,
                'user_id' => self::INSTRUCTOR_USERNAME
            ]);
    }

    public static function deleteCourseLikes(): void
    {
        self::deleteCourse();
        DB::connection('mysql')
            ->table('instructor_courses_like')
            ->where('instructor_course_id', self::INSTRUCTOR_COURSE_ID)
            ->delete();
    }

    public static function insertCourseCoupon(): void
    {
        self::insertCourse();
        DB::connection('mysql')
            ->table('instructor_courses_coupons')
            ->insert([
                'id' => self::CUSTOM_UUID,
                'instructor_course_id' => self::INSTRUCTOR_COURSE_ID,
                'discount' => 88,
                'max_redemptions' => 12,
                'expiry_date' => '2025-08-02'
            ]);
    }

    public static function deleteCourseCoupon(): void
    {
        self::deleteCourse();
        DB::connection('mysql')
            ->table('instructor_courses_coupons')
            ->where('instructor_course_id', self::INSTRUCTOR_COURSE_ID)
            ->delete();
    }

    public static function insertCourseLike(): void
    {
        self::insertCourse();
        DB::connection('mysql')
            ->table('instructor_courses_like')
            ->insert([
                'instructor_course_id' => self::INSTRUCTOR_COURSE_ID,
                'user_id' => self::INSTRUCTOR_USERNAME,
            ]);
    }

    public static function deleteCourseLike(): void
    {
        self::deleteCourse();
        DB::connection('mysql')
            ->table('instructor_courses_like')
            ->where('instructor_course_id', self::INSTRUCTOR_COURSE_ID)
            ->delete();
    }

    public static function insertEarnings(): void
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

    public static function deleteEarnings(): void
    {
        self::deleteCourse();
        DB::connection('mysql')
            ->table('instructor_earnings')
            ->where('instructor_course_id', self::INSTRUCTOR_COURSE_ID)
            ->delete();
    }

    public static function insertLessons(): void
    {
        self::insertSections();
        DB::connection('mysql')
            ->table('instructor_lessons')
            ->insert([
                'id' => self::CUSTOM_ID,
                'instructor_section_id' => self::CUSTOM_ID,
                'title' => 'title lesson 1',
                'description' => 'description lesson 1',
                'code' => 'code lesson 1',
                'order_in_section' => 1
            ]);
    }

    public static function deleteLessons(): void
    {
        self::deleteSections();
        DB::connection('mysql')
            ->table('instructor_lessons')
            ->where('instructor_section_id', self::CUSTOM_ID)
            ->delete();
    }

    public static function insertSections(): void
    {
        self::insertCourse();
        DB::connection('mysql')
            ->table('instructor_sections')
            ->insert([
                'id' => self::CUSTOM_ID,
                'instructor_course_id' => self::INSTRUCTOR_COURSE_ID,
                'title' => 'title section 1',
                'order_in_course' => 1
            ]);
    }

    public static function deleteSections(): void
    {
        self::deleteCourse();
        DB::connection('mysql')
            ->table('instructor_sections')
            ->where('instructor_course_id', self::INSTRUCTOR_COURSE_ID)
            ->delete();
    }

    public static function insertSocials(): void
    {
        DB::connection('mysql')
            ->table('instructor_socials')
            ->insert([
                'id' => self::CUSTOM_ID,
                'instructor_id' => self::INSTRUCTOR_USERNAME,
                'url_link' => 'https://www.instagram.com/ilhamrhmtkbr',
                'app_name' => 'instagram',
                'display_name' => self::INSTRUCTOR_USERNAME
            ]);
    }

    public static function deleteSocials(): void
    {
        DB::connection('mysql')
            ->table('instructor_socials')
            ->where('instructor_id', self::INSTRUCTOR_USERNAME)
            ->delete();
    }
}
