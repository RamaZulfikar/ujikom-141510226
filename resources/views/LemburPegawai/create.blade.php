@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Lembur Pegawai</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/Lembur') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('kode_lembur_id') ? ' has-error' : '' }}">
                            <label for="kode_lembur_id" class="col-md-4 control-label">Kode Lembur</label>

                            <div class="col-md-6">
                                <select name="kode_lembur_id" class="form-control" >
                                    <option value="">Pilih</option>
                                    @foreach ($kategori as $variabel)
                                    <option value="{!! $variabel->id !!}">{!! $variabel->kode_lembur !!}</option>
                                     @endforeach
                                </select>

                                @if ($errors->has('kode_lembur_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_lembur_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                      <div class="form-group{{ $errors->has('pegawai_id') ? ' has-error' : '' }}">
                            <label for="pegawai_id" class="col-md-4 control-label">Nama Pegawai</label>

                            <div class="col-md-6">
                                <select name="pegawai_id" class="form-control" >
                                    <option value="">Pilih</option>
                                    @foreach ($Pegawai as $variabel1)
                                    <option value="{!! $variabel1->id !!}">{!! $variabel1->user->name !!}{!! $variabel1->nip !!}</option>
                                     @endforeach
                                </select>
                               
                                @if ($errors->has('pegawai_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pegawai_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('jumlah_jam') ? ' has-error' : '' }}">
                            <label for="jumlah_jam" class="col-md-4 control-label">Jumlah Jam</label>

                            <div class="col-md-6">
                                <input id="jumlah_jam" type="text" class="form-control" name="jumlah_jam" required>

                                @if ($errors->has('jumlah_jam'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jumlah_jam') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                   
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
