@extends('layouts.app')
@section('content')
<div class="container">
<div class="panel panel-default">
<div class="panel-heading"><h3><b>Ubah Pegawai</b></h3></div>
<div class="panel-body">
	{!! Form::model($pegawai, ['method' => 'PATCH', 'route' => ['pegawai.update', $pegawai->id]]) !!}
	<div class="form-group">
		{!! Form::label('NIP', 'NIP :') !!}
		{!! Form::text ('nip', null, ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('Nama Jabatan', 'Nama Jabatan : ') !!}
		<select class="form-control" name="jabatan_id"> 
		@foreach ($jab as $data)
		<option value="{{$data->id}}">{{$data->nama_jabatan}}</option>
		@endforeach
	</select>
	</div>
	<div class="form-group">
		{!! Form::label('Nama Golongan', 'Nama Golongan : ') !!}
		<select class="form-control" name="golongan_id"> 
		@foreach ($gol as $data)
		<option value="{{$data->id}}">{{$data->nama_golongan}}</option>
		@endforeach
	</select>
	</div>
	<div class="form-group">
		{!! Form::label('Photo', 'Photo :') !!}
		{!! Form::file ('foto', null, ['class' => 'form-control']) !!}
		<br>
		<img src="{{asset('/assets/image/'.$pegawai->foto)}}" height="100px" width="100px">
	</div>
	<div class="form-group">
		{!! Form::submit('Update', ['class' => 'btn btn-danger']) !!}
	</div>
	{!! Form::close() !!}
</div>
</div>
</div>
</div>


@stop
