@extends('layouts.app')
@section('content')

<div class="container">
	<h1> Tunjangan Pegawai</h1>
	<br>
	<a href="{{ url('/tunjangpegawai/create')}}" class="btn btn-success">Tambah Data</a>
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
			<td><center>{{ $paradise->pegawaii->users->name}}</center></td>
			<td><center>{{ $paradise->pegawaii->nip}}</center></td>
			<td><center>{{ $paradise->pegawaii->jabatan->nama_jabatan}}</center></td>
			<td><center>{{ $paradise->pegawaii->golongan->nama_golongan}}</center></td>
			<td><center>Rp. {{ number_format($paradise->tunjangan->besaran_uang )}}</center></td>
			<td><center><a href="{{ route('tunjangpegawai.edit', $paradise->id)}}" class="btn btn-danger">Ubah</a></center></td>
			<td><center>
				{!! Form::open(['method'=> 'DELETE', 'route' => ['tunjangpegawai.destroy', $paradise->id]]) !!}
				{!! Form::submit('Hapus', ['class' =>'btn btn-success']) !!}
			</center></td>
		</tr>
		@endforeach
	</table>
</div>
</div>
@stop