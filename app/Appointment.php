<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    protected $fillable = [
      'pasien_id',
      'dokter_id',
      'dokpoli_id',
      'status_appo',
      'tanggal_appo'
    ];
    public function dokter(){
      return $this->belongsTo('App\Dokter');
    }
    public function pasien(){
      return $this->belongsTo('App\Pasien');
    }
    
}
