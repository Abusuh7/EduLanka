<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->unsignedBigInteger('grade_id')->nullable();
            $table->unsignedBigInteger('class_id')->nullable();

            $table->foreign('grade_id')->references('id')->on('grades');
            $table->foreign('class_id')->references('id')->on('classes');
        });
    }

    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign(['grade_id']);
            $table->dropForeign(['class_id']);
            $table->dropColumn(['grade_id', 'class_id']);
        });
    }

};
