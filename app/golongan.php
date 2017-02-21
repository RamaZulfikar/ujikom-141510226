<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class golongan extends Model
{
    protected $table = 'golongan';
    protected $filable =array('kode_golongan','nama_golongan','besaran_uang');

    public function pegawai(){
    	return $this->HasMany('App\pegawai','golongan_id');
    }
}
