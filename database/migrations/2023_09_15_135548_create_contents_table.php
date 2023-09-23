<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subject_id'); // Subject of the content
            $table->unsignedBigInteger('class_id'); // ID of the associated class
            $table->unsignedBigInteger('grade_id'); // ID of the associated grade
            $table->unsignedBigInteger('teacher_id'); // ID of the teacher who created the content
            $table->string('title'); // Title of the content
            $table->text('description'); // Description of the content
            $table->string('file_path'); // Path to the uploaded file
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('class_id')->references('id')->on('classes');
            $table->foreign('grade_id')->references('id')->on('grades');
            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->foreign('subject_id')->references('id')->on('subjects');
        });
    }

    public function down()
    {
        Schema::dropIfExists('contents');
    }
}
