<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\utils\Repository;

class CoursesTest extends TestCase
{
    function test_instructor_berhasil_mendapatkan_semua_data_course()
    {
        Repository::insertCourse();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->get($this->url . '/courses');
        $res->assertJsonFragment([
            'id' => '550e8400-e29b-41d4-a716-446655440000',
            'title' => 'kursus1',
            'image' => 'image1',
            'description' => 'description1',
            'editor' => 'php',
        ]);
        Repository::deleteCourse();
    }

    function test_instructor_gagal_mendapatkan_semua_data_course_karena_tidak_terautentikasi()
    {
        $res = $this->get($this->url . '/courses');
        $res->assertStatus(401)
            ->assertJson([
                'message' => 'Access token not provided'
            ]);
    }

    function test_instructor_berhasil_mendapatkan_semua_data_course_detail()
    {
        Repository::insertCourse();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->get($this->url . '/courses/show?id=' . Repository::INSTRUCTOR_COURSE_ID);
        $res->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Show data successfully'
            ])
            ->assertJsonFragment([
                'id' => '550e8400-e29b-41d4-a716-446655440000',
                'instructor_id' => 'juggernaut',
                'title' => 'kursus1',
                'description' => 'description1',
                'image' => 'image1',
                'price' => 0,
                'level' => 'junior',
                'status' => 'free',
                'visibility' => 'public',
                'notes' => 'notes1',
                'requirements' => 'requirements1',
                'editor' => 'php',
            ]);;
        Repository::deleteCourse();
    }

    function test_instructor_gagal_mendapatkan_semua_data_course_detail_karena_tidak_terautentikasi()
    {
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->get($this->url . '/courses/show');
        $res->assertStatus(422)
            ->assertJson([
                'success' => false,
            ]);
    }

    function test_instructor_gagal_memasukan_data_course_karena_data_course_duplikat()
    {
        Repository::insertCourse();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->post($this->url . '/courses', [
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
        $res->assertStatus(409)
            ->assertJson([
               'success' => false,
               'message' => 'Data has been there'
            ]);
        Repository::deleteCourse();
    }

    function test_instructor_gagal_memasukan_data_course_karena_tidak_mengirimkan_data_course_apapun()
    {
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->post($this->url . '/courses');
        $res->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'Validation failed'
            ])
            ->assertJsonFragment([
                'title' => ['The title field is required.'],
                'description' => ['The description field is required.'],
                'image' => ['The image field is required.'],
                'price' => ['The price field is required.'],
                'level' => ['The level field is required.'],
                'status' => ['The status field is required.'],
                'visibility' => ['The visibility field is required.'],
                'editor' => ['The editor field is required.'],
            ]);
    }

    function test_instructor_berhasil_mengubah_data_course()
    {
        Repository::insertCourse();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->patch($this->url . '/courses', [
                'id' => Repository::INSTRUCTOR_COURSE_ID,
                'title' => 'kursus1 update',
                'description' => 'description1 update',
                'price' => 0,
                'image' => '',
                'level' => 'junior',
                'status' => 'free',
                'visibility' => 'public',
                'notes' => 'notes1 update',
                'requirements' => 'requirements1 update',
                'editor' => 'php'
            ]);
        $res->assertStatus(200)
            ->assertJson([
               'success' => true,
               'message' => 'Update data successfully'
            ]);
        Repository::deleteCourse();
    }

    function test_instructor_gagal_mengubah_data_course_karena_tidak_mengirimkan_data_course_apapun()
    {
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->patch($this->url . '/courses');
        $res->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'Validation failed'
            ])
            ->assertJsonFragment([
               'id' => ['The id field is required.'],
               'title' => ['The title field is required.'],
               'description' => ['The description field is required.'],
               'price' => ['The price field is required.'],
               'level' => ['The level field is required.'],
               'status' => ['The status field is required.'],
               'visibility' => ['The visibility field is required.'],
               'editor' => ['The editor field is required.'],
            ]);
    }

    function test_instructor_berhasil_menghapus_data_course()
    {
        Repository::insertCourse();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->delete($this->url . '/courses?id='.Repository::INSTRUCTOR_COURSE_ID);
        $res->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Delete data successfully'
            ]);
    }

    function test_instructor_gagal_menghapus_data_course_karena_tidak_mengirimkan_data_course_apapun()
    {
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->delete($this->url . '/courses');
        $res->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'The id field is required.'
            ]);
    }

    function test_instructor_berhasil_mendapatkan_data_course_yang_disukai()
    {
        Repository::insertCourseLikes();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->get($this->url . '/courses/likes');

        $res->assertJsonFragment([
            'username' => 'mirana',
            'email' => 'mirana@gmail.com',
            'role' => 'student',
            'full_name' => 'user',
        ]);

        $res->assertJsonFragment([
            'username' => 'juggernaut',
            'email' => 'juggernaut@gmail.com',
            'role' => 'instructor',
            'full_name' => 'user',
        ]);

        Repository::deleteCourseLikes();
    }

    function test_instructor_berhasil_mendapatkan_data_course_review()
    {
        Repository::insertCourseReviews();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->get($this->url . '/courses/reviews');

        $res->assertJsonFragment([
            'course_title' => 'kursus1',
            'student_full_name' => 'user',
            'student_review' => 'review aaa',
            'student_rating' => 9,
        ]);

        Repository::deleteCourseReviews();
    }
}
