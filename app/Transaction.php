<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'id_rute','id_user','tanggal','tarif','status'
    ];
}
