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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('role')->default('admin');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();

            // $table->id();
            // $table->enum('role', ['admin', 'teacher', 'pms', 'sns']); //pms (primary student)
            // $table->string('fname');
            // $table->string('lname');
            // $table->date('dob');
            // $table->string('email')->unique()->nullable();
            // $table->string('gender');
            // $table->unsignedBigInteger('parent_id')->nullable();
            // $table->unsignedBigInteger('enroll_id');
            // $table->rememberToken();
            // $table->foreignId('current_team_id')->nullable();
            // $table->string('profile_photo_path', 2048)->nullable();
            // $table->timestamps();

            // $table->foreign('parent_id')->references('id')->on('parents_details');
            // $table->foreign('enroll_id')->references('id')->on('student_enrollment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
