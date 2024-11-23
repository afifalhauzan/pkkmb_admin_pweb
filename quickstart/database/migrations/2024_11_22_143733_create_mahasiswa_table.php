<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateMahasiswaTable extends Migration
{
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->string('NIM', 15)->primary();
            $table->string('Admin_NIM', 15)->nullable();
            $table->unsignedBigInteger('Cluster_ID')->nullable();
            $table->string('Nama', 45);
            $table->string('Prodi', 45);
            $table->string('Email', 45);
            $table->foreign('Admin_NIM')->references('NIM')->on('users')->onDelete('set null');
            $table->foreign('Cluster_ID')->references('Cluster_ID')->on('clusters')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mahasiswa');
    }
}

