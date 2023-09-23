<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrudEventsTable extends Migration
{
    public function up()
    {
        Schema::create('crud_events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Add user_id column
            $table->string('event_name');
            $table->date('event_start');
            $table->date('event_end');
            $table->timestamps();

            // Add a foreign key constraint to associate events with users
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::table('crud_events', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Drop the foreign key constraint
        });

        Schema::dropIfExists('crud_events');
    }
}
