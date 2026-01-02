<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('instructor_courses', function (Blueprint $table) {
            $table->uuid('id')->nullable(false)->primary();
            $table->string('instructor_id', 45)->nullable(false);
            $table->string('title', 100)->nullable(false)->unique();
            $table->string('description', 325)->nullable(false);
            $table->string('image', 80)->nullable(false);
            $table->unsignedBigInteger('price')->nullable(false);
            $table->enum('level', ['junior', 'middle', 'advanced'])->nullable(false);
            $table->enum('status', ['free', 'paid'])->default('paid');
            $table->enum('visibility', ['public', 'private'])->default('public');
            $table->string('notes', 150)->nullable();
            $table->text('requirements')->nullable();
            $table->enum('editor', ['javascript', 'java', 'python', 'php', 'c', 'cpp', 'ruby', 'go', 'swift', 'kotlin', 'typescript', 'sql', 'html', 'css', 'xml', 'json', 'yaml', 'bash', 'shell', 'plaintext', 'r', 'dart', 'rust'])->nullable(false);
            $table->timestamps();

            $table->foreign('instructor_id')->references('user_id')->on('instructors')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructors_course');
    }
};
