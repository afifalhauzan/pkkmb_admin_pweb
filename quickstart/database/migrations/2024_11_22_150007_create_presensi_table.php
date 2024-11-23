<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresensiTable extends Migration
{
    public function up()
    {
        Schema::create('presensi', function (Blueprint $table) {
            $table->id();
            $table->string('Kode_Presensi', 15);
            $table->string('Admin_NIM', 15)->nullable();
            $table->string('Mahasiswa_NIM', 15);
            $table->unsignedBigInteger('Kegiatan_ID');
            $table->dateTime('Waktu_Presensi');
            $table->foreign('Kode_Presensi')->references('Kode_Presensi')->on('valid_presensi')->onDelete('cascade');
            $table->foreign('Admin_NIM')->references('NIM')->on('users')->onDelete('set null');
            $table->foreign('Mahasiswa_NIM')->references('NIM')->on('mahasiswa')->onDelete('cascade');
            $table->foreign('Kegiatan_ID')->references('ID_Kegiatan')->on('kegiatan')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('presensi');
    }
}
