<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->integer('id_gate_masuk')->nullable();
            $table->integer('id_gate_keluar')->nullable();
            $table->integer('tarif_golongan_i')->nullable();
            $table->integer('tarif_golongan_ii')->nullable();
            $table->integer('tarif_golongan_iii')->nullable();
            $table->integer('tarif_golongan_iv')->nullable();
            $table->integer('tarif_golongan_v')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routes');
    }
}
