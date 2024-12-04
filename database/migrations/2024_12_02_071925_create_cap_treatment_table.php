<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapTreatmentTable extends Migration
{
    public function up()
    {
        Schema::create('cap_treatment', function (Blueprint $table) {
            $table->id('id_pemesanan');
            $table->string('nama');
            $table->text('alamat_lengkap');
            $table->string('no_hp');
            $table->string('email')->nullable();
            $table->enum('pickup_delivery', ['pickup', 'delivery']);
            $table->dateTime('tanggal_jam_pickup')->nullable();
            $table->integer('jumlah_sepatu');
            $table->enum('service', ['Deep Clean: Medium', 'Deep Clean: Hard']);
            $table->text('note')->nullable();
            $table->enum('progress', ['pending', 'on progress', 'done'])->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cap_treatment');
    }
}
