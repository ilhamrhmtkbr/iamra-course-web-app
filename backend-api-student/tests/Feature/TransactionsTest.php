<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\utils\Repository;

class TransactionsTest extends TestCase
{
    public function test_student_berhasil_mendapatkan_semua_data_transactions(): void
    {
        Repository::insertTransactions();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->get($this->url . '/transactions');
        $res->assertJsonFragment([
            'order_id' => '93ca88t635ba5',
            'student_id' => 'johndoe',
            'instructor_course_id' => '550e8400-e29b-41d4-a716-446655440000',
            'amount' => 17500,
            'midtrans_data' => '{"transaction": "value"}',
            'status' => 'settlement',
        ]);
        Repository::deleteTransactions();
    }

    public function test_student_gagal_mendapatkan_semua_data_transactions()
    {
        $res = $this->get($this->url . '/transactions');
        $res->assertStatus(401)
            ->assertJson([
                'message' => 'Access token not provided'
            ]);
    }

    public function test_student_berhasil_mendapatkan_data_transaction_detail(): void
    {
        Repository::insertTransactions();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->get($this->url . '/transactions/show?order_id=' . Repository::STUDENT_ORDER_ID);
        $res->assertJsonFragment([
            'order_id' => '93ca88t635ba5',
            'student_id' => 'johndoe',
            'instructor_course_id' => '550e8400-e29b-41d4-a716-446655440000',
            'instructor_course_coupon_id' => null,
            'amount' => 17500,
            'midtrans_data' => '{"transaction": "value"}',
            'status' => 'settlement',
        ]);
        Repository::deleteTransactions();
    }

    public function test_student_gagal_mendapatkan_data_transaction_detail_karena_tidak_mengirimkan_order_id()
    {
        Repository::insertTransactions();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->get($this->url . '/transactions/show');
        $res->assertJson([
           'success' => false,
           'message' => 'You are not authorized to perform this action'
        ]);
        Repository::deleteTransactions();
    }

//    public function test_student_berhasil_menambahkan_data_transaction(): void
//    {
//        $res = $this->withUnencryptedCookie('access_token', self::$token)
//            ->post($this->url . '/transactions', [
//                'instructor_course_id' => Repository::INSTRUCTOR_COURSE_ID,
//                'instructor_course_coupon' => ''
//            ]);
//        $res->assertStatus(201)
//            ->assertJson([
//               'success' => true,
//               'message' => 'Store data successfully'
//            ]);
//        Repository::deleteTransactions();
//    }

    public function test_student_gagal_menambahkan_data_transaction_karena_data_duplikat()
    {
        Repository::insertTransactions();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->post($this->url . '/transactions', [
                'instructor_course_id' => Repository::INSTRUCTOR_COURSE_ID,
                'instructor_course_coupon' => ''
            ]);
        $res->assertJson([
            'success' => false,
            'message' => 'You have purchased this course, please pay'
        ]);
        Repository::deleteTransactions();
    }

    public function test_student_gagal_menambahkan_data_transaction_karena_tidak_mengirimkan_data_apapun()
    {
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->post($this->url . '/transactions');
        $res->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'Validation failed'
            ])
            ->assertJsonFragment([
                'instructor_course_id' => ['The instructor course id field is required.']
            ]);
    }

//    public function test_student_berhasil_mengubah_data_transaction(): void
//    {
//        $res = $this->withUnencryptedCookie('access_token', self::$token)
//            ->patch($this->url . '/transactions');
//        var_dump($res->json());
//    }
//
//    public function test_student_gagal_mengubah_data_transaction()
//    {
//        $res = $this->withUnencryptedCookie('access_token', self::$token)
//            ->patch($this->url . '/transactions');
//        var_dump($res->json());
//    }

//    public function test_student_berhasil_menghapus_data_transaction(): void
//    {
//        $res = $this->withUnencryptedCookie('access_token', self::$token)
//            ->delete($this->url . '/transactions');
//        var_dump($res->json());
//    }
//
//    public function test_student_gagal_menghapus_data_transaction()
//    {
//        $res = $this->withUnencryptedCookie('access_token', self::$token)
//            ->delete($this->url . '/transactions');
//        var_dump($res->json());
//    }

    public function test_student_berhasil_mengecek_kupon(): void
    {
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->post($this->url . '/transactions/check-coupon', [
                'course_id' => 'tidak-ada'
            ]);
        $res->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Get data successfully'
            ]);
    }

    public function test_student_gagal_mengecek_kupon_karena_tidak_mengirimkan_course_id()
    {
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->post($this->url . '/transactions/check-coupon');
        $res->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'The course id field is required.'
            ]);
    }
}
