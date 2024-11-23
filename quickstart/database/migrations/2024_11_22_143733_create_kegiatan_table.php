<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatanTable extends Migration
{
    public function up()
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id('ID_Kegiatan');
            $table->string('Admin_NIM', 15)->nullable();
            $table->string('Nama', 45);
            $table->string('Tahun', 45);
            $table->foreign('Admin_NIM')->references('NIM')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kegiatan');
    }
}

