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
        Schema::table('announcements', function (Blueprint $table) {
            // Drop unnecessary columns
            $columnsToCheck = ['title', 'upload_date', 'description'];
            foreach ($columnsToCheck as $column) {
                if (Schema::hasColumn('announcements', $column)) {
                    $table->dropColumn($column);
                }
            }
            
            // Add new columns
            if (!Schema::hasColumn('announcements', 'start_air')) {
                $table->datetime('start_air')->after('details');
            }
            if (!Schema::hasColumn('announcements', 'end_air')) {
                $table->datetime('end_air')->after('start_air');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('announcements', function (Blueprint $table) {
            // Add back old columns
            $table->string('title')->nullable()->default('');
            $table->date('upload_date')->nullable();
            $table->text('description')->nullable()->default('');
            
            // Drop new columns
            if (Schema::hasColumn('announcements', 'start_air')) {
                $table->dropColumn('start_air');
            }
            if (Schema::hasColumn('announcements', 'end_air')) {
                $table->dropColumn('end_air');
            }
        });
    }
};