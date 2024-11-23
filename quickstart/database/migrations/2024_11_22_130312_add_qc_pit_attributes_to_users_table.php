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
        Schema::table('users', function (Blueprint $table) {
            $table->string('nim', 15)->nullable()->unique(); // NIM for QC/PIT users
            $table->string('nama', 45)->nullable();          // Name for QC/PIT users
            $table->string('prodi', 45)->nullable();         // Program of study for QC/PIT users
            $table->string('role', 20)->default('qc');       // Role attribute with default value 'qc'
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['nim', 'nama', 'prodi', 'role']);
        });
    }
};
