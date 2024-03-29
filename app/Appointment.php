<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    protected $fillable = [
      'pasien_id',
      'dokter_id',
      'poli_id',
    //   'tanggal',
    'jadwal_id',
      'status_appo',
      'keterangan'
    ];
    public function dokter(){
      return $this->belongsTo('App\Dokter');
    }
    public function pasien(){
      return $this->belongsTo('App\Pasien');
    }
    public function poli(){
      return $this->belongsTo('App\Poli');
    }
    public function jadwal(){
        return $this->belongsTo('App\Jadwal');
    }

}
