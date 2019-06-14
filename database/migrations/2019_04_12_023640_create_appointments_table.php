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
            $table->string('keterangan');
            $table->string('tanggal');
            $table->timestamps();
            $table->unsignedInteger('pasien_id');
            $table->foreign('pasien_id')->references('id')->on('pasiens');
            $table->unsignedInteger('dokter_id');
            $table->foreign('dokter_id')->references('id')->on('dokters');
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
        Schema::dropIfExists('appointments');
    }
}
