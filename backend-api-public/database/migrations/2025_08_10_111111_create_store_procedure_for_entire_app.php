<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        // 1. GetStudentQuestion
        DB::unprepared("
            DROP PROCEDURE IF EXISTS GetStudentQuestion;
            CREATE PROCEDURE GetStudentQuestion(
                IN p_question_id INT,
                IN studentId VARCHAR(111)
            )
            BEGIN
                SELECT sq.id,
                       sq.question,
                       sq.created_at,
                       ic.id         AS course_id,
                       ic.title      AS course_title,
                       ia.id         AS answer_id,
                       ia.answer,
                       ia.created_at AS answer_created_at
                FROM student_questions sq
                         JOIN instructor_courses ic ON sq.instructor_course_id = ic.id
                         LEFT JOIN instructor_answers ia ON ia.student_question_id = sq.id
                WHERE sq.id = p_question_id
                  AND sq.student_id COLLATE utf8mb4_unicode_ci = studentId COLLATE utf8mb4_unicode_ci;
            END
        ");

        // 2. GetInstructorAnswers
        DB::unprepared("
            DROP PROCEDURE IF EXISTS GetInstructorAnswers;
            CREATE PROCEDURE GetInstructorAnswers(
                IN instructorId VARCHAR(111),
                IN sort VARCHAR(111),
                IN page INT,
                IN perPage INT
            )
            BEGIN
                DECLARE offsetValue INT;
                SET offsetValue = (page - 1) * perPage;

                SELECT ic.title,
                       sq.id       AS question_id,
                       sq.question AS question,
                       sq.created_at AS question_created_at,
                       ia.id       AS answer_id,
                       ia.answer   AS answer,
                       u.full_name AS student,
                       COUNT(*) OVER() AS total_count
                FROM student_questions AS sq
                         JOIN instructor_courses AS ic ON sq.instructor_course_id = ic.id
                         LEFT JOIN instructor_answers AS ia ON ia.student_question_id = sq.id
                         JOIN students AS s ON sq.student_id = s.user_id
                         JOIN users AS u ON s.user_id = u.username
                WHERE ic.instructor_id COLLATE utf8mb4_unicode_ci = instructorId COLLATE utf8mb4_unicode_ci
                ORDER BY sort COLLATE utf8mb4_unicode_ci
                LIMIT perPage OFFSET offsetValue;
            END
        ");

        // 3. GetInstructorLessons
        DB::unprepared("
            DROP PROCEDURE IF EXISTS GetInstructorLessons;
            CREATE PROCEDURE GetInstructorLessons(
                IN instructorId VARCHAR(111),
                IN sectionId INT,
                IN page INT,
                IN perPage INT
            )
            BEGIN
                DECLARE offsetValue INT;
                SET offsetValue = (page - 1) * perPage;

                SELECT il.id,
                       il.instructor_section_id,
                       il.title,
                       il.description,
                       il.code,
                       il.order_in_section,
                       il.created_at,
                       il.updated_at,
                       ic.editor,
                       COUNT(*) OVER() AS total_count
                FROM instructor_lessons AS il
                         JOIN instructor_sections AS isc ON il.instructor_section_id = isc.id
                         JOIN instructor_courses AS ic ON isc.instructor_course_id = ic.id
                WHERE ic.instructor_id COLLATE utf8mb4_unicode_ci = instructorId COLLATE utf8mb4_unicode_ci
                  AND isc.id = sectionId
                ORDER BY il.order_in_section
                LIMIT perPage OFFSET offsetValue;
            END
        ");
    }

    public function down(): void
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS GetStudentQuestion;");
        DB::unprepared("DROP PROCEDURE IF EXISTS GetInstructorAnswers;");
        DB::unprepared("DROP PROCEDURE IF EXISTS GetInstructorLessons;");
    }
};
