@extends('layouts.app')
@section('content')
<div class="container">
<div class="panel panel-danger">
<div class="panel-heading"><h3><b>Ubah Tunjangan</b></h3></div>
<div class="panel-body">
	{!! Form::model($tunjangan, ['method' => 'PATCH', 'route' => ['tunjangan.update', $tunjangan->id]]) !!}
	<div class="form-group">
		{!! Form::label('Kode Tunjangan', 'Kode Tunjangan :') !!}
		{!! Form::text ('kode_tunjangan', null, ['class' => 'form-control']) !!}
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
	<label>Status
		<select type="text" class="form-control" name="Status" required>
			<option>Menikah</option>
			<option>Belum Menikah</option>
			<option>Duda</option>
			<option>Janda</option>
		</select>
		</label>
	</div>
	<div class="form-group">
		{!! Form::label('Jumlah Anak', 'Jumlah Anak :') !!}
		{!! Form::text ('jumlah_anak', null, ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('Besaran Uang', 'Besaran Uang :') !!}
		{!! Form::text ('besaran_uang', null, ['class' => 'form-control']) !!}
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
