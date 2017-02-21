@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
            <div class="panel panel-heading"><h1><center>Edit Jabatan</center></h1></div>
                <form action="{{ route('jabatan.update', $jabatan->id) }}" method="post">
        <input type="hidden" name="_method" value="PATCH">
         {{csrf_field()}}

        <div class="form-group">Kode Jabatan
       <input type="text"  name="kode_jabatan" class="form-control" placeholder="kode_jabatan" value="{{ $jabatan->kode_jabatan }}" required>
     @if ($errors->has('kode_jabatan'))
      <span class="help-block">
               <strong>{{ $errors->first('kode_jabatan') }}</strong>
               </span>
                 @endif
            </div>

        <div class="form-group">Nama Jabatan
            <input type="text" name="nama_jabatan" class="form-control" placeholder="Nama Jabatan" value="{{ $jabatan->nama_jabatan }}">
        </div>

         <div class="form-group">Besaran uang
            <input type="text" name="besaran_uang" class="form-control" placeholder="Besaran uang" value="{{ $jabatan->besaran_uang }}">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Simpan">
        </div>
    </form>
            </div>
        </div>
    </div>
</div>
@endsection
