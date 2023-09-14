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
        Schema::create('parents_details', function (Blueprint $table) {
            $table->id();

            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            //phone number
            $table->string('phone');
            $table->string('address');
            $table->string('city');
            //state
            $table->string('state');
            //zip
            $table->string('zip');
            //country
            $table->string('country');
            //student_id with starting value 1
            // $table->unsignedBigInteger('student_id');
            $table->timestamps();

            // $table->foreign('student_id')->references('id')->on('primary_students');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parents_details');
    }
};
