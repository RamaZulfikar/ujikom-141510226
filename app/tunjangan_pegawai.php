<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tunjangan_pegawai extends Model
{
    protected $table = 'tunjangan_pegawai';
    protected $fillable = ['id','kode_tunjangan_id','pegawai_id'];
    public $timestamps = true;

    public function tunjangan(){
    	return $this->belongsTo('App\tunjangan', 'kode_tunjangan_id');
    }
    public function pegawaii(){
    	return $this->belongsTo('App\pegawai', 'pegawai_id');
    }
   
}
