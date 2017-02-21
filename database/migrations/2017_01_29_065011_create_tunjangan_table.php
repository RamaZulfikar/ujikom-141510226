<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTunjanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tunjangan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_tunjangan')->unique();
            $table->unsignedInteger('jabatan_id');
            $table->foreign('jabatan_id')->references('id')->on('jabatan')->onDelete('CASCADE');
             $table->unsignedInteger('golongan_id');
            $table->foreign('golongan_id')->references('id')->on('golongan')->onDelete('CASCADE');
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
        Schema::dropIfExists('tunjangan');
    }
}
