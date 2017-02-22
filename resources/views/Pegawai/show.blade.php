@extends('layouts.app')
@section('content')
    <h1>Book Show</h1>

    <form class="form-horizontal">
        <div class="form-group">
            
        <div class="form-group">
            <label for="nip" class="col-sm-2 control-label">NIP</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nip" placeholder={{$pegawai->nip}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="user_id" class="col-sm-2 control-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="user_id" placeholder={{$pegawai->User->name}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="author" class="col-sm-2 control-label">Jabatan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="author" placeholder={{$pegawai->jabatan->nama_jabatan}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="golongan_id" class="col-sm-2 control-label">Golongan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="golongan_id" placeholder={{$pegawai->golongan->nama_golongan}} readonly>
            </div>
        </div>

        <label for="image" class="col-sm-2 control-label">Foto</label>
         <div class="col-sm-10">
                <img src="{{asset('img/'.$pegawai->image.'.jpg')}}" height="180" width="150" class="img-rounded">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a href="{{ url('pegawai')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </form>
@stop