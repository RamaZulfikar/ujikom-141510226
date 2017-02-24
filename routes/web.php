<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/error', function ()
{
	return view('gagal');
});

Auth::routes();

Route::get('/table', 'tablecontroller@index');
Route::get('/', 'HomeController@index');
	

Route::resource('golongan','Golongancontroller');
Route::resource('jabatan','JabatanController');
Route::resource('pegawai','PegawaiController');
Route::resource('kategori','Kategori_Lembur');
Route::resource('Lembur','Lembur_pegawai');
Route::resource('tunjangan','tunjangancontroller');
Route::resource('tunjangpegawai','tunjangan_pegawaicontroller');
Route::resource('penggajian','penggajiancontroller');
Route::resource('/user','usercontroller');

