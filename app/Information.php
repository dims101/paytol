<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $fillable=[
        'nama_informasi','keterangan','tanggal','waktu','status'
    ];
}
