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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->date('dob');
            $table->string('gender');
            $table->string('email');
            $table->string('subject');
            //phone number
            $table->string('phone');
            //address
            $table->string('address');
            //city
            $table->string('city');
            //state
            $table->string('state');
            //zip
            $table->string('zip');
            //country
            $table->string('country');
            $table->unsignedBigInteger('enroll_id');
            $table->unsignedBigInteger('class_id'); // Add class_id column
            $table->unsignedBigInteger('grade_id'); // Add grade_id column
            $table->timestamps();

            $table->foreign('enroll_id')->references('id')->on('teacher_enrollments')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade'); // Add class_id foreign key
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade'); // Add grade_id foreign key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
