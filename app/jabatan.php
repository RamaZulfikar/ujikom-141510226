<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jabatan extends Model
{
    protected $table='jabatan';
    protected $fillable=array('kode_jabatan','nama_jabatan','besaran_uang');

    public function kategori_lembur(){
    	return $this->HasMany('App\kategori_lembur','jabatan_id');
    }
    public function tunjangan(){
    	return $this->HasMany('App\tunjangan','jabatan_id');
    }
    public function pegawai(){
    	return $this->HasMany('App\pegawai','jabatan_id');
    }
}
