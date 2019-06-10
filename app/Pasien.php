<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    //
    protected $fillable = [
      'nama_pasien',
      'alamat_pasien',
      'norm_pasien',
      'password'
    ];

    protected $hidden = [
        'password',
    ];

    public function appointments(){
      return $this->hasMany('App\Appointment');
    }
}
