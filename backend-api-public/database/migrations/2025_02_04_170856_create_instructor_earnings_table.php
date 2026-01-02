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
        Schema::create('instructor_earnings', function (Blueprint $table) {
            $table->string('order_id')->nullable(false)->primary();
            $table->string('instructor_course_id', 70)->nullable(false);
            $table->string('student_id', 45)->nullable(false);
            $table->integer('amount')->nullable(false);
            $table->enum('status', ['settlement', 'deny', 'pending', 'cancel', 'expire', 'accepted', 'failure']);
            $table->timestamps();

            $table->foreign('instructor_course_id')->references('id')->on('instructor_courses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('student_id')->references('user_id')->on('students')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructors_earning');
    }
};
