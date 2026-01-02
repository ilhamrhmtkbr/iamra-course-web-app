<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('instructor_answers', function (Blueprint $table) {
            $table->id();
            $table->string('instructor_id', 45)->nullable(false);
            $table->unsignedBigInteger('student_question_id')->nullable(false);
            $table->text('answer')->nullable(false);
            $table->timestamps();

            $table->foreign('instructor_id')->references('user_id')->on('instructors');
            $table->foreign('student_question_id')->references('id')->on('student_questions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructors_answer');
    }
};
