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
        Schema::create('room_books', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('facilitator_name');
            $table->string('event_name');
            $table->integer('number_of_people');
            $table->date('event_date'); 
            $table->time('start_time');
            $table->string('required_equipment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_books');
    }
};
