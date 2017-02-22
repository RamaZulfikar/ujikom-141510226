@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
            <div class="panel panel-heading"><h1><center>Edit Kategori Lembur</center></h1></div>
                <form action="{{ route('Lembur.update', $lemburr->id) }}" method="post">
        <input type="hidden" name="_method" value="PATCH">
         {{csrf_field()}}

      

        <div class="form-group">Jabatan
            <select name="pegawai_id" class="form-control" >
                                  <option value="">pilih</option>
                                  @foreach ($pegawai as $variabel)
                                  <option value="{!! $variabel->id !!}">{!! $variabel->user->name !!}
                                                                        {!! $variabel->nip !!}
                                                                        </option>
                                     @endforeach
                                </select>
        </div>

         <div class="form-group">Jumlah Jam
            <input type="text" name="jumlah_jam" class="form-control" placeholder="Jumlah jam" value="{{ $lemburr->jumlah_jam }}">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Simpan">
            <a href="{{ url('Lembur')}}" class="btn btn-primary">Back</a>
        </div>
    </form>
            </div>
        </div>
    </div>
</div>
@endsection
