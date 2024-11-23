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
            $table->dropColumn('nama');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nama', 45)->nullable(); // Re-add `nama` if rolled back
        });
    }
};
