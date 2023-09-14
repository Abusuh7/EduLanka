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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->date('dob');
            // $table->string('email');
            $table->string('gender');
            $table->string('category');
            $table->unsignedBigInteger('parent_id');
            $table->unsignedBigInteger('enroll_id');
            $table->unsignedBigInteger('class_id'); // Add class_id column
            $table->unsignedBigInteger('grade_id'); // Add grade_id column
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('parents_details');
            $table->foreign('enroll_id')->references('id')->on('student_enrollment');
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade'); // Add class_id foreign key
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade'); // Add grade_id foreign key

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
