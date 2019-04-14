<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    //
    protected $fillable = [
      'nama_pasien',
      'alamat_pasien',
      'notelp_pasien',
      'norm_pasien',
      'password'
    ];

    public function appointments(){
      return $this->hasMany('App\Appointment');
    }
}