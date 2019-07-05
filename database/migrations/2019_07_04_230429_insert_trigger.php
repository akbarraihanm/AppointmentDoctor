<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::unprepared('
                CREATE TRIGGER tr_after_delete AFTER DELETE ON `appointments` FOR EACH ROW
                    BEGIN
                        INSERT INTO `history_appos`
                        SET id = OLD.id, status_appo = OLD.status_appo, keterangan = OLD.keterangan, created_at = NOW(), updated_at = NOW(), pasien_id = OLD.pasien_id, 
                        dokter_id = OLD.dokter_id, poli_id = OLD.poli_id, jadwal_id = OLD.jadwal_id;
                    END
                ');        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        DB::unprepared('DROP TRIGGER `tr_after_delete`');        
    }
}
