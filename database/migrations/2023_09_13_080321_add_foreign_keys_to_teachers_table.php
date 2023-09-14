<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teachers', function (Blueprint $table) {
            // Add a foreign key constraint for class_id
            $table->foreignId('class_id')
                ->references('id')
                ->on('classes') // Assuming the table name for classes is 'classes'
                ->onDelete('cascade');


            // Add a foreign key constraint for grade_id
            $table->foreignId('grade_id')
                ->references('id')
                ->on('grades') // Assuming the table name for grades is 'grades'
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teachers', function (Blueprint $table) {
            // Drop the foreign key constraints
            $table->dropColumn(['class_id']);
            $table->dropColumn(['grade_id']);
        });
    }
}
