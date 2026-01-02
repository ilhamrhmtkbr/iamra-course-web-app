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
        Schema::create('instructor_accounts', function (Blueprint $table) {
            $table->uuid('id')->nullable(false)->primary();
            $table->string('instructor_id', 45)->nullable(false)->unique();
            $table->unsignedBigInteger('account_id')->nullable(false)->unique();
            $table->string('bank_name', 50)->nullable(false);
            $table->string('alias_name', 75)->nullable(false);
            $table->timestamps();

            $table->foreign('instructor_id')->references('user_id')->on('instructors')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructors_account');
    }
};
