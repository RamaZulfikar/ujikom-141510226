@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
            <div class="panel panel-heading"><h1><center>Edit Golongan</center></h1></div>
                <form action="{{ route('golongan.update', $golong->id) }}" method="post">
        <input type="hidden" name="_method" value="PATCH">
         {{csrf_field()}}

        <div class="form-group">Kode Golongan
       <input type="text"  name="kode_golongan" class="form-control" placeholder="kode_golongan" value="{{ $golong->kode_golongan }}" required>
     @if ($errors->has('kode_golongan'))
      <span class="help-block">
               <strong>{{ $errors->first('kode_golongan') }}</strong>
               </span>
                 @endif
            </div>

        <div class="form-group">Nama Golongan
            <input type="text" name="nama_golongan" class="form-control" placeholder="Nama Golongan" value="{{ $golong->nama_golongan }}">
        </div>

         <div class="form-group">Besaran uang
            <input type="text" name="besaran_uang" class="form-control" placeholder="Besaran uang" value="{{ $golong->besaran_uang }}">
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
