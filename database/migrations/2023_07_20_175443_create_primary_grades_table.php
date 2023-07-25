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
        Schema::create('primary_grades', function (Blueprint $table) {
            $table->id();
            //only 5 grade names
            $table->enum('grade_name', ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('primary_grades');
    }
};
