@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
            <div class="panel panel-heading"><h1><center>JABATAN</center></h1></div>
                <a href="{{url('/jabatan/create')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Tambah Data</a><br>
                <div class="panel-body">
                <div class="form-group"><center>
                </center></div>
                <table class="table table-bordered">
                    <tr class="bg-info">
                        <th><center>No.</center></th>
                        <th><center>Kode Jabatan</center></th>
                        <th><center>Nama Jabatan</center></th>
                        <th><center>Besaran Uang</center></th>
                        <th colspan="2"><center>Actions</center></th>
                    </tr>
                    @php
                    $no=1;
                    @endphp
                    <tbody>
                        @foreach ($jabatans as $data)
                            <tr>
                                <td><center>{{ $no++ }}</center></td>
                                <td><center>{{ $data->kode_jabatan }}</center></td>
                                <td><center>{{ $data->nama_jabatan }}</center></td>
                                <td><center>{{ $data->besaran_uang }}</center></td>
                                <td><center>
                 <form method="POST" action="{{ route('jabatan.destroy', $data->id) }}" accept-charset="UTF-8">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <a href="{{ route('jabatan.edit', $data->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span>Edit</a><td>
                <center>
                <span class="glyphicon glyphicon-trash"></span>
                <input type="submit" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus Data??');" value="Delete">
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
