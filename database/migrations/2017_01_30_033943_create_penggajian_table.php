<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenggajianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penggajian', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tunjangan_id');
            $table->foreign('tunjangan_id')->references('id')->on('tunjangan_pegawai')->onDelete('CASCADE');
            $table->string('jumlah_jam_lembur');
            $table->string('jumlah_uang_lembur');
            $table->integer('gaji_pokok');
            $table->integer('total_gaji');
            $table->date('tanggal_pengembalian');
            $table->string('status_pengembalian');
            $table->string('petugas_penerima');
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
        Schema::dropIfExists('penggajian');
    }
}
