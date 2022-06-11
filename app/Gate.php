<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gate extends Model
{
    protected $fillable = [
        'nama','kode_barcode','gambar_barcode'
    ];
}
