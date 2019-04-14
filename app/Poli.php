<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    //
    protected $fillable = ['nama_poli'];

    public function dokters(){
      return $this->hasMany('App\Dokter');
    }
}
