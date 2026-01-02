<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('mysql')
            ->table('instructor_sections')
            ->insert([
                ['id' => 1,  'instructor_course_id' => '04699fb5-81da-481e-aa7d-2935e3fac81a', 'title' => 'PHP Dasar',       'order_in_course' => 1],
                ['id' => 2,  'instructor_course_id' => '04699fb5-81da-481e-aa7d-2935e3fac81a', 'title' => 'PHP OOP',         'order_in_course' => 2],
                ['id' => 3,  'instructor_course_id' => '04699fb5-81da-481e-aa7d-2935e3fac81a', 'title' => 'PHP 8',           'order_in_course' => 3],
                ['id' => 4,  'instructor_course_id' => '04699fb5-81da-481e-aa7d-2935e3fac81a', 'title' => 'PHP MYSQL',       'order_in_course' => 4],
                ['id' => 5,  'instructor_course_id' => '04699fb5-81da-481e-aa7d-2935e3fac81a', 'title' => 'PHP WEB',         'order_in_course' => 5],
                ['id' => 6,  'instructor_course_id' => '04699fb5-81da-481e-aa7d-2935e3fac81a', 'title' => 'PHP Composer',    'order_in_course' => 6],
                ['id' => 7,  'instructor_course_id' => '04699fb5-81da-481e-aa7d-2935e3fac81a', 'title' => 'PHP Unit Test',   'order_in_course' => 7],

                ['id' => 8,  'instructor_course_id' => '57750f38-163f-47d9-9e0a-82621c650648', 'title' => 'Dasar',           'order_in_course' => 1],

                ['id' => 9,  'instructor_course_id' => 'bc2fd5d9-3250-4e50-b7b6-c865f25d68cf', 'title' => 'SQL Server DDL',  'order_in_course' => 1],
                ['id' => 10, 'instructor_course_id' => 'bc2fd5d9-3250-4e50-b7b6-c865f25d68cf', 'title' => 'SQL Server DML',  'order_in_course' => 2],

                ['id' => 11, 'instructor_course_id' => '1ccd82b7-3f16-41a5-a7e0-2dac0869e0ff', 'title' => 'Dasar',            'order_in_course' => 1],

                ['id' => 12, 'instructor_course_id' => 'f3ab42bb-7457-470e-96eb-f87270a51e8e', 'title' => 'Dasar',            'order_in_course' => 1],

                ['id' => 13, 'instructor_course_id' => '07e21fd2-c9bd-4934-a161-f2920454122f', 'title' => 'Dasar',            'order_in_course' => 1],
                ['id' => 14, 'instructor_course_id' => '07e21fd2-c9bd-4934-a161-f2920454122f', 'title' => 'Branching',        'order_in_course' => 2],
                ['id' => 15, 'instructor_course_id' => '07e21fd2-c9bd-4934-a161-f2920454122f', 'title' => 'Remote',           'order_in_course' => 3],

                ['id' => 16, 'instructor_course_id' => '5b0c6efb-171c-4b51-b4d3-1e157399bdde', 'title' => 'Dasar',            'order_in_course' => 1],
                ['id' => 17, 'instructor_course_id' => '5b0c6efb-171c-4b51-b4d3-1e157399bdde', 'title' => 'Dockerfile',       'order_in_course' => 2],
            ]);
    }
}
