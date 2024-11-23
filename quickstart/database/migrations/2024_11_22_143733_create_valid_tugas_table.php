<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValidTugasTable extends Migration
{
    public function up()
    {
        Schema::create('valid_tugas', function (Blueprint $table) {
            $table->id('ID_Tugas');
            $table->string('Judul', 255);
            $table->text('Deskripsi')->nullable();
            $table->string('Admin_NIM', 15)->nullable();
            $table->foreign('Admin_NIM')->references('NIM')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('valid_tugas');
    }
}
