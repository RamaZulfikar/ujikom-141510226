<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pegawailembur extends Model
{
    protected $table = 'lembur_pegawai';
	protected $fillable = ['id','kode_lembur_id','pegawai_id','jumlah_jam','created_at','update_at'];
	public $timestamps = true;

	public function pegawai(){
		return $this->belongsTo('App\pegawai','pegawai_id');
	}
	public function kategoribur(){
		return $this->belongsTo('App\kategoriL','kode_lembur_id');
	}
	public function golongan(){
		return $this->belongsTo('App\golongan');
	}

	public function jabatan(){
		return $this->belongsTo('App\jabatan');
	}
}
