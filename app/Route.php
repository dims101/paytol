<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = [
        'id_gate_masuk','id_gate_keluar','tarif_golongan_i','tarif_golongan_ii','tarif_golongan_iii','tarif_golongan_iv','tarif_golongan_v'
    ];
}
