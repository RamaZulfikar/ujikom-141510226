@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Kategori Lembur</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/kategori') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('kode_lembur') ? ' has-error' : '' }}">
                            <label for="kode_lembur" class="col-md-4 control-label">Kode Lembur</label>

                            <div class="col-md-6">
                                <input id="kode_lembur" type="text" class="form-control" name="kode_lembur" value="{{ old('kode_lembur') }}" required>

                                @if ($errors->has('kode_lembur'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_lembur') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                      <div class="form-group{{ $errors->has('jabatan_id') ? ' has-error' : '' }}">
                            <label for="jabatan_id" class="col-md-4 control-label">Jabatan</label>

                            <div class="col-md-6">
                                <select name="jabatan_id" class="form-control" >
                                    <option value="">Pilih</option>
                                    @foreach ($jabatann as $variabel)
                                    <option value="{!! $variabel->id !!}">{!! $variabel->nama_jabatan !!}</option>
                                     @endforeach
                                </select>
                               
                                @if ($errors->has('jabatan_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jabatan_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group{{ $errors->has('golongan_id') ? ' has-error' : '' }}">
                            <label for="golongan_id" class="col-md-4 control-label">Golongan</label>

                            <div class="col-md-6">
                               <select name="golongan_id" class="form-control">
                                   <option value="">Pilih</option>
                                   @foreach($golongann as $fariabel)
                                   <option value="{!!$fariabel->id!!}">{!!$fariabel->nama_golongan!!}</option>
                                   @endforeach
                               </select>

                                @if ($errors->has('golongan_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('golongan_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('besaran_uang') ? ' has-error' : '' }}">
                            <label for="besaran_uang" class="col-md-4 control-label">Besaran Uang</label>

                            <div class="col-md-6">
                                <input id="besaran_uang" type="text" class="form-control" name="besaran_uang" required>

                                @if ($errors->has('besaran_uang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('besaran_uang') }}</strong>
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
