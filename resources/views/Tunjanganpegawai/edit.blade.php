@extends('layouts.app')

@section('content')

<div class="col-md-offset-1">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Edit Tunjangan Pegawai</div>
                    
                <div class="panel-body">
                     {!!Form::model($tunjanganpegawai,['method'=>'PATCH','route'=>['tunjangpegawai.update',$tunjanganpegawai->id]])!!}

                            <div class="col-md-6">
                                <label>Nama Pegawai</label>
                                <select name="pegawai_id" class="form-control">
                                @foreach($pegawai as $datapegawai)
                                    <option value="{{$datapegawai->id}}">
                                        {{$datapegawai->User->name}}
                                    </option>
                                @endforeach
                                </select>
                                <span class="help-block">
                                        <strong>{{ $errors->first('pegawai_id') }}</strong>
                                    </span>
                            </div>

                            <div class="col-md-6">
                                <label>Kode Tunjangan</label>
                                <input type="text" class="form-control" name="kode_tunjangan" value="{{$tunjanganpegawai->tunjangan->kode_tunjangan}}" autofocus>

                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_tunjangan') }}</strong>
                                    </span>
                            </div>

                            <div class="col-md-6">
                                <label>Jumlah Anak</label>
                                <input type="text" class="form-control" name="jumlah_anak" value="{{$tunjanganpegawai->tunjangan->jumlah_anak}}" autofocus>

                                    <span class="help-block">
                                        <strong>{{ $errors->first('jumlah_anak') }}</strong>
                                    </span>
                            </div>

                            <div class="col-md-6">
                                <label for="Jabatan">Status</label>
                                    <select class="col-md-6 form-control" name="status">
                                            <option name="status">Menikah</option>
                                            <option name="status">BelumMenikah</option>
                                            <option name="status">Duda</option>
                                            <option name="status">Janda</option>
                                    </select>
                            </div>


                            <div class="col-md-12">
                                <label>Besaran Uang</label>
                                <input type="text" value="{{$tunjanganpegawai->tunjangan->besaran_uang}}" class="form-control" name="besaran_uang" autofocus>

                                    <span class="help-block">
                                        <strong>{{ $errors->first('besaran_uang') }}</strong>
                                    </span>
                            </div>
                        
                           <div class="col-md-12">
                            <button type="submit" class="btn btn-danger form-control">Update</button>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
    
@endsection
