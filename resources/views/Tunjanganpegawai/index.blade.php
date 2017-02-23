@extends('layouts.app')
@section('content')

<div class="container">
	<h1> Tunjangan Pegawai</h1>
	<br>
	<a href="{{ url('/tunjangpegawai/create')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus"> Tambah Data</a>
<br>
<br>
<div class="table-responsive">
	<table class="table table-bordered">
		<tr class="bg-info">
			<th><center>No</center></th>
			<th><center>Kode Tunjangan</center></th>
			<th><center>NIP</center></th>
			<th><center>Nama Pegawai</center></th>
			<th><center>Jabatan</center></th>
			<th><center>Golongan</center></th>
			<th><center>Besar Uang Tunjangan Pegawai</center></th>
			<th colspan="2"><center>Action</center></th>
		</tr>

		<?php $no=1;?>
		@foreach ($tunjang as $paradise)
		<tr>
			<td><center>{{ $no++ }}</center></td>
			<td><center>{{ $paradise->tunjangan->kode_tunjangan}}</center></td>
			<td><center>{{ $paradise->pegawaii->user->name}}</center></td>
			<td><center>{{ $paradise->pegawaii->nip}}</center></td>
			<td><center>{{ $paradise->pegawaii->jabatan->nama_jabatan}}</center></td>
			<td><center>{{ $paradise->pegawaii->golongan->nama_golongan}}</center></td>
			<td><center>Rp. {{ number_format($paradise->tunjangan->besaran_uang )}}</center></td>
			<td><center><form method="POST" action="{{ route('tunjangpegawai.destroy', $paradise->id) }}" accept-charset="UTF-8">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <a href="{{ route('tunjangpegawai.edit', $paradise->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil">Edit</a><td>
                <span class="glyphicon glyphicon-trash">
                <input type="submit" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus Data??');" value="Delete">
			</center></td>
		</tr>
		@endforeach
	</table>
</div>
</div>
@stop