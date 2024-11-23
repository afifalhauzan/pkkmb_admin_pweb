<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClustersTable extends Migration
{
    public function up()
    {
        Schema::create('clusters', function (Blueprint $table) {
            $table->id('Cluster_ID');
            $table->string('Admin_NIM', 15)->nullable();
            $table->foreign('Admin_NIM')->references('NIM')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clusters');
    }
}
