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
        Schema::create('discussion_room_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->string('room_name');
            $table->integer('capacity');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('status');
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('teacher_id')->references('id')->on('teachers');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discussion_room_bookings');
    }
};
