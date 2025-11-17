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
        Schema::create('cell_communities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['Krispen', 'BYC','DLC']);
            $table->string('facilitator_name');
            $table->string('contact_info');
            $table->string('meeting_schedule');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cell_communities');
    }
};
