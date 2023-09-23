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
        Schema::create('student_grade', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            //grade id should only
            $table->unsignedBigInteger('grade_id')->default(0);
            $table->unsignedBigInteger('class_id')->default(0);
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('grade_id')->references('id')->on('grades');
            $table->foreign('class_id')->references('id')->on('classes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_grade');
    }
};
