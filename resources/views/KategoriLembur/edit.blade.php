@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
            <div class="panel panel-heading"><h1><center>Edit Kategori Lembur</center></h1></div>
                <form action="{{ route('kategori.update', $kateg->id) }}" method="post">
        <input type="hidden" name="_method" value="PATCH">
         {{csrf_field()}}

        <div class="form-group">Kode Kategori Lembur
       <input type="text"  name="kode_lembur" class="form-control" placeholder="kode_lembur" value="{{ $kateg->kode_lembur }}" required>
     @if ($errors->has('kode_lembur'))
      <span class="help-block">
               <strong>{{ $errors->first('kode_lembur') }}</strong>
               </span>
                 @endif
            </div>

        <div class="form-group">Jabatan
            <select name="jabatan_id" class="form-control" >
                                    <option value="">Pilih</option>
                                    @foreach ($jabatann as $variabel)
                                    <option value="{!! $variabel->id !!}">{!! $variabel->nama_jabatan !!}</option>
                                     @endforeach
                                </select>
        </div>

        <div class="form-group">Golongan
            <select name="golongan_id" class="form-control">
                                   <option value="">Pilih</option>
                                   @foreach($golongann as $fariabel)
                                   <option value="{!!$fariabel->id!!}">{!!$fariabel->nama_golongan!!}</option>
                                   @endforeach
                               </select>
        </div>

         <div class="form-group">Besaran uang
            <input type="text" name="besaran_uang" class="form-control" placeholder="Besaran uang" value="{{ $kateg->besaran_uang }}">
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
