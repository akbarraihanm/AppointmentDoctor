<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pimpinan extends Model
{
    //
    protected $fillable = [
        'username',
        'password'
    ];
    
    protected $hidden = ['password'];
}
