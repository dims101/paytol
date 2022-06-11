<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userapp extends Model
{
    protected $fillable = [
        'username','nama','profil','email','telepone','kendaraan','status','saldo','password'
    ];

    protected $hidden = [
        'password'
    ];
}
