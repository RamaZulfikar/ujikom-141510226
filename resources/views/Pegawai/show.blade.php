@extends('layouts.app')
@section('content')

<div class="container">
<div class="panel panel-default">
<div class="panel-heading"><h3><b>Show Pegawai</b></h3></div>
<div class="panel-body">


<center><img src="{{asset('/assets/image/'.$pegawai->foto)}}" height="200" width="200"></center>

<div class="form-group">
    {!! Form::label('NIP', 'NIP :') !!}
    <input type="text" name="nip" class="form-control" placeholder="{{ $pegawai->nip}}" readonly>
</div>

<div class="form-group">
    {!!Form::label('Nama', 'Nama :') !!}
                <input type="text" class="form-control" id="user_id" placeholder="{{$pegawai->User->name}}" readonly>
            </div>
        

<div class="form-group">
    {!! Form::label('Nama Jabatan', 'Nama Jabatan :') !!}
    <input type="text" name="jabatan_id" class="form-control" placeholder="{{ $pegawai->jabatan->nama_jabatan}}" readonly>
</div>

<div class="form-group">
    {!! Form::label('Nama Golongan', 'Nama Golongan :') !!}
    <input type="text" name="golongan_id" class="form-control" placeholder="{{ $pegawai->golongan->nama_golongan}}" readonly>
</div>
 <a href="{{ route('pegawai.index')}}" class="btn btn-primary">Kembali</a>


<div class="form-group">
<div class="col-sm-4">
   
</div>
</div>
</div>
</div>
</div>
</div>
@stop







