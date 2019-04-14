<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status_appo');
            $table->date('tanggal_appo');
            $table->timestamps();
        });
        Schema::table('appointments', function(Blueprint $table){
          $table->unsignedInteger('pasien_id');
          $table->foreign('pasien_id')->references('id')->on('pasiens');
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
        Schema::dropIfExists('appointments');
    }
}
