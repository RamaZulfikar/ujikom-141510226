@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
            <div class="panel panel-heading"><h1><center>Pegawai</center></h1></div>
                <a href="{{url('/pegawai/create')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Tambah Data</a><br>
                <div class="panel-body">
                <div class="form-group"><center>
                </center></div>
                <table class="table table-bordered">
                    <tr class="bg-info">
                        <th><center>No.</center></th>
                        <th><center>NIP</center></th>
                        <th><center>Nama</center></th>
                        <th><center>Jabatan</center></th>
                        <th><center>Golongan</center></th>
                        <th><center>Photo</center></th>
                        <th colspan="3"><center>Actions</center></th>
                    </tr>
                    @php
                    $no=1;
                    @endphp
                    <tbody>
                        @foreach ($pegawaii as $data)
                            <tr>
                                <td><center>{{ $no++ }}</center></td>
                                <td><center>{{ $data->nip }}</center></td>
                                <td><center>{{ $data->User->name }}</center></td>
                                <td><center>{{ $data->jabatan->nama_jabatan }}</center></td>
                                <td><center>{{ $data->golongan->nama_golongan }}</center></td>
                                <td><center><img src="assets/image/{{$data->foto}}" height="100" width="100"></center></td>
                                <td><center>

                 <form method="POST" action="{{ route('pegawai.destroy', $data->id) }}" accept-charset="UTF-8">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <a href="{{ route('pegawai.edit', $data->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span>Edit</a><td>
                <center>
                <span class="glyphicon glyphicon-trash"></span>
                <input type="submit" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus Data??');" value="Delete">
                <td><a href="{{url('pegawai',$data->id)}}" class="btn btn-primary"><span class="glyphicon glyphicon-book"></span>Read</a></td>
                                    </center>
                                    </center>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    

</div>
@endsection
