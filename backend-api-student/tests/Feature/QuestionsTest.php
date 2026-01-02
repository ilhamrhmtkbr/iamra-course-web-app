<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\utils\Repository;

class QuestionsTest extends TestCase
{
    function test_student_berhasil_mendapatkan_data_questions()
    {
        Repository::insertQuestions('question1');
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->get($this->url . '/questions');
        $res->assertJsonFragment([
            'question' => 'question1',
            'instructor_course_id' => '550e8400-e29b-41d4-a716-446655440000',
        ]);

        Repository::deleteQuestions();
    }

    function test_student_gagal_mendapatkan_data_questions_karena_tidak_terautentikasi()
    {
        $res = $this->get($this->url . '/questions');
        $res->assertStatus(401)
            ->assertJson([
                'message' => 'Access token not provided'
            ]);
    }

    function test_student_berhasil_mendapatkan_data_question_detail()
    {
        Repository::insertQuestions('question1');
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->get($this->url . '/questions/show?id=999');
        $res->assertJsonFragment([
            'id' => 999,
            'question' => 'question1',
            'course_id' => '550e8400-e29b-41d4-a716-446655440000',
            'course_title' => 'kursus1',
        ]);
        Repository::deleteQuestions();
    }

    function test_student_gagal_mendapatkan_data_question_detail_karena_tidak_mengirimkan_id()
    {
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->get($this->url . '/questions/show');
        $res->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'The id field is required.'
            ]);
    }

    function test_student_berhasil_menambahkan_data_question()
    {
        Repository::insertStudentBuyCourse();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
                ->post($this->url . '/questions' , [
                    'instructor_course_id' => Repository::INSTRUCTOR_COURSE_ID,
                    'question' => 'custom-question 123'
                ]);
        $res->assertStatus(201)
            ->assertJson([
                'success' => true,
                'message' => 'Store data successfully'
            ]);
        Repository::deleteQuestions();
        Repository::deleteStudentBuyCourse();
    }

    function test_student_gagal_menambahkan_data_question_karena_tidak_mengirimkan_data_apapun()
    {
        Repository::insertStudentBuyCourse();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->post($this->url . '/questions' );
        $res->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'Validation failed'
            ])
            ->assertJsonFragment([
                'instructor_course_id' => ['The instructor course id field is required.'],
                'question' => ['The question field is required.']
            ]);
        Repository::deleteStudentBuyCourse();
    }

    function test_student_berhasil_menambahkan_data_question_karena_data_duplikat()
    {
        Repository::insertStudentBuyCourse();
        Repository::insertQuestions('custom-question 123');
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->post($this->url . '/questions' , [
                'instructor_course_id' => Repository::INSTRUCTOR_COURSE_ID,
                'question' => 'custom-question 123'
            ]);
        $res->assertStatus(409)
            ->assertJson([
                'success' => false,
                'message' => 'Data has been there'
            ]);
        Repository::deleteStudentBuyCourse();
        Repository::deleteQuestions();
    }

    function test_student_berhasil_mengubah_data_question()
    {
        Repository::insertStudentBuyCourse();
        Repository::insertQuestions('custom-question 123');
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->patch($this->url . '/questions' , [
                'id' => 999,
                'instructor_course_id' => Repository::INSTRUCTOR_COURSE_ID,
                'question' => 'custom-question 123'
            ]);
        $res->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Update data successfully'
            ]);
        Repository::deleteStudentBuyCourse();
        Repository::deleteQuestions();
    }

    function test_student_gagal_mengubah_data_question_karena_tidak_mengirimkan_data_apapun()
    {
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->patch($this->url . '/questions' , [
                'id' => '',
                'instructor_course_id' => '',
                'question' => ''
            ]);
        $res->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'Validation failed'
            ])
            ->assertJsonFragment([
                'id' => ['The id field is required.'],
                'question' => ['The question field is required.']
            ]);
    }

    function test_student_berhasil_menghapus_data_question()
    {
        Repository::insertQuestions('custom-question 123');
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->delete($this->url . '/questions' , [
                'id' => 999,
            ]);
        $res->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Delete data successfully'
            ]);
    }

    function test_student_gagal_menghapus_data_question_karena_tidak_mengirimkan_data_apapun()
    {
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->delete($this->url . '/questions' , [
                'id' => '',
            ]);
        $res->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'The id field is required.'
            ]);
    }
}
