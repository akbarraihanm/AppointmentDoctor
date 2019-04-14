<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal');
            $table->string('jam_mulai');
            $table->string('jam_selesai');
            $table->timestamps();
        });
        Schema::table('jadwals', function(Blueprint $table){
          $table->unsignedInteger('dokter_id');
          $table->foreign('dokter_id')->references('id')->on('dokters');
          $table->unsignedInteger('dokpoli_id');
          $table->foreign('dokpoli_id')->references('poli_id')->on('dokters');
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
        Schema::dropIfExists('jadwals');
    }
}
