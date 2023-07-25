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
        Schema::create('primary_students', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->date('dob');
            // $table->string('email');
            $table->string('gender');
            $table->unsignedBigInteger('parent_id');
            $table->unsignedBigInteger('enroll_id');
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('parents_details');
            $table->foreign('enroll_id')->references('id')->on('student_enrollment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('primary_students');
    }
};
