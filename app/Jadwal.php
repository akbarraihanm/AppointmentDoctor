<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    //
    protected $fillable = [
      'dokter_id',
      'tanggal',
      'jam_mulai',
      'jam_selesai'
    ];
    public function dokter(){
      return $this->belongsTo('App\Dokter');
    }
    public function appo(){
        return $this->hasMany('App\Appointment');
    }
}
