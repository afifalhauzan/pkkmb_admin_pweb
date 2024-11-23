<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTugasTable extends Migration
{
    public function up()
    {
        Schema::create('tugas', function (Blueprint $table) {
            $table->id();
            $table->string('Mahasiswa_NIM', 15);
            $table->unsignedBigInteger('ID_Tugas');
            $table->text('File_Tugas')->nullable();
            $table->integer('Nilai')->nullable();
            $table->foreign('Mahasiswa_NIM')->references('NIM')->on('mahasiswa')->onDelete('cascade');
            $table->foreign('ID_Tugas')->references('ID_Tugas')->on('valid_tugas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tugas');
    }
}
