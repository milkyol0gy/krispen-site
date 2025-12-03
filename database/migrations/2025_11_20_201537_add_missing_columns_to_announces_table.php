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
            if (!Schema::hasColumn('announcements', 'headline')) {
                $table->string('headline')->after('user_id');
            }
            if (!Schema::hasColumn('announcements', 'upload_date')) {
                $table->date('upload_date')->after('headline');
            }
            if (!Schema::hasColumn('announcements', 'details')) {
                $table->text('details')->after('upload_date');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('announcements', function (Blueprint $table) {
            $columns = ['headline', 'upload_date', 'details'];
            foreach ($columns as $column) {
                if (Schema::hasColumn('announcements', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};