<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValidPresensiTable extends Migration
{
    public function up()
    {
        Schema::create('valid_presensi', function (Blueprint $table) {
            $table->id();
            $table->string('Kode_Presensi', 50)->unique();
            $table->unsignedBigInteger('Kegiatan_ID');
            $table->string('Description', 200)->nullable();
            $table->foreign('Kegiatan_ID')->references('ID_Kegiatan')->on('kegiatan')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('valid_presensi');
    }
}
