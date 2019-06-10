<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoktersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_dokter');
            $table->string('notelp')->unique();
            $table->string('password');
            $table->timestamps();
        });

        Schema::table('dokters', function(Blueprint $table){
          $table->unsignedInteger('poli_id');
          $table->foreign('poli_id')->references('id')->on('polis');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokters');
    }
}
