<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    //
    protected $fillable = [
      'poli_id',
      'nama_dokter',
      'notelp_dokter',
      'username',
      'password'
    ];

    public function poli(){
      return $this->belongsTo('App\Poli');
    }
    public function jadwals(){
      return $this->hasMany('App\Jadwal');
    }
    public function appointments(){
      return $this->hasMany('App\Appointment');
    }
}
