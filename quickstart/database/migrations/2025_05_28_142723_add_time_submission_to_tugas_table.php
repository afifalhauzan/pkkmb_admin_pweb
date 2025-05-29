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
        Schema::table('tugas', function (Blueprint $table) {
            // Add the new column as a datetime, nullable
            // Placing it after 'File_Tugas' for logical order
            $table->dateTime('time_submission')->nullable()->after('File_Tugas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tugas', function (Blueprint $table) {
            // Drop the column if rolling back the migration
            $table->dropColumn('time_submission');
        });
    }
};