<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKategoriLemburTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_lembur', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_lembur')->unique();
            $table->unsignedInteger('jabatan_id');
            $table->foreign('jabatan_id')->references('id')->on('jabatan')->onDelete('CASCADE');
            $table->unsignedInteger('golongan_id');
            $table->foreign('golongan_id')->references('id')->on('golongan')->onDelete('CASCADE');
            $table->string('besaran_uang');
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
        Schema::dropIfExists('kategori_lembur');
    }
}
