<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    protected $table='pegawai';
    protected $fillable=array('nip','user_id','jabatan_id','golongan_id','foto');

    public function jabatan(){
    	return $this->belongsTo('App\jabatan','jabatan_id');
    }
    public function golongan(){
    	return $this->belongsTo('App\golongan','golongan_id');
    }
    public function user(){
    	return $this->belongsTo('App\User','user_id');
    }

    public function tunjanganpegawai(){
        return $this->hasMany('App\tunjangan_pegawai', 'pegawai_id');
    } 
    
    public function lemburpegawai(){
        return $this->hasMany('App\pegawailembur','pegawai_id');
    }
}
