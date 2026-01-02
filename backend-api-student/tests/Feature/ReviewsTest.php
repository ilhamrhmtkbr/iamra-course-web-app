<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\utils\Repository;

class ReviewsTest extends TestCase
{
    function test_student_berhasil_mendapatkan_data_reviews()
    {
        Repository::insertReviews();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->get($this->url . '/reviews');
        $res->assertJsonStructure([
            'success',
            'message',
            'data' => [
                'current_page',
                'data' => [
                    [
                        'id',
                        'instructor_course_id',
                        'student_id',
                        'review',
                        'rating',
                        'created_at',
                        'updated_at',
                        'instructor_course' => [
                            'id',
                            'title',
                            'description',
                        ],
                    ]
                ],
                'first_page_url',
                'from',
                'last_page',
                'last_page_url',
                'links',
                'next_page_url',
                'path',
                'per_page',
                'prev_page_url',
                'to',
                'total',
            ]
        ]);
        Repository::deleteReviews();
    }

    function test_student_gagal_mendapatkan_data_reviews_karena_tidak_terautentikasi()
    {
        $res = $this->get($this->url . '/reviews');
        $res->assertStatus(401)
            ->assertJson([
                'message' => 'Access token not provided'
            ]);
    }

    function test_student_berhasil_menambahkan_data_review()
    {
        Repository::insertStudentBuyCourse();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->post($this->url . '/reviews' , [
                'instructor_course_id' => Repository::INSTRUCTOR_COURSE_ID,
                'review' => 'review satu',
                'rating' => 9
            ]);
        $res->assertStatus(201)
            ->assertJson([
                'success' => true,
                'message' => 'Store data successfully'
            ]);
        Repository::deleteStudentBuyCourse();
        Repository::deleteReviews();
    }

    function test_student_gagal_menambahkan_data_review_karena_data_duplikat()
    {
        Repository::insertStudentBuyCourse();
        Repository::insertReviews();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->post($this->url . '/reviews' , [
                'instructor_course_id' => Repository::INSTRUCTOR_COURSE_ID,
                'review' => 'review satu',
                'rating' => 9
            ]);
        $res->assertStatus(409);
        Repository::deleteReviews();
        Repository::deleteStudentBuyCourse();
    }

    function test_student_gagal_menambahkan_data_review_karena_tidak_mengirimkan_data_apapun()
    {
        Repository::insertStudentBuyCourse();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->post($this->url . '/reviews');
        $res->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'Validation failed'
            ])
            ->assertJsonFragment([
                'instructor_course_id' => ['The instructor course id field is required.'],
                'review' => ['The review field is required.'],
                'rating' => ['The rating field is required.']
            ]);
        Repository::deleteStudentBuyCourse();
    }

    function test_student_berhasil_mengubah_data_review()
    {
        Repository::insertStudentBuyCourse();
        Repository::insertReviews();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->patch($this->url . '/reviews', [
                'instructor_course_id' => Repository::INSTRUCTOR_COURSE_ID,
                'review' => 'review update',
                'rating' => 8
            ]);
        $res->assertStatus(200);
        Repository::deleteStudentBuyCourse();
        Repository::deleteReviews();
    }

    function test_student_gagal_mengubah_data_review_karena_tidak_mengirimkan_data_apapun()
    {
        Repository::insertStudentBuyCourse();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->patch($this->url . '/reviews');
        $res->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'Validation failed'
            ])
            ->assertJsonFragment([
                'instructor_course_id' => ['The instructor course id field is required.'],
                'review' => ['The review field is required.'],
                'rating' => ['The rating field is required.']
            ]);
        Repository::deleteStudentBuyCourse();
    }

    function test_student_berhasil_menghapus_data_review()
    {
        Repository::insertStudentBuyCourse();
        Repository::insertReviews();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->delete($this->url . '/reviews?id=999');
        $res->assertStatus(200);
        Repository::deleteStudentBuyCourse();
    }
}
