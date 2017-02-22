<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLemburPegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lembur_pegawai', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('kode_lembur_id');
            $table->foreign('kode_lembur_id')->references('id')->on('kategori_lembur')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->unsignedInteger('pegawai_id');
            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('CASCADE');
            $table->string('jumlah_jam');
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
        Schema::dropIfExists('lembur_pegawai');
    }
}
