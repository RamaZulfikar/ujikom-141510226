@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
            <div class="panel panel-heading"><h1><center>Golongan</center></h1></div>
                <a href="{{url('/golongan/create')}}" class="btn btn-success">Tambah Data</a><br>
                <div class="panel-body">
                <div class="form-group"><center>
                </center></div>
                <table class="table table-bordered">
                    <tr class="bg-info">
                        <th><center>No.</center></th>
                        <th><center>Kode Golongan</center></th>
                        <th><center>Nama Golongan</center></th>
                        <th><center>Besaran Uang</center></th>
                        <th colspan="2"><center>Actions</center></th>
                    </tr>
                    @php
                    $no=1;
                    @endphp
                    <tbody>
                        @foreach ($golong as $data)
                            <tr>
                                <td><center>{{ $no++ }}</center></td>
                                <td><center>{{ $data->kode_golongan }}</center></td>
                                <td><center>{{ $data->nama_golongan }}</center></td>
                                <td><center>{{ $data->besaran_uang }}</center></td>
                                <td><center>
                 <form method="POST" action="{{ route('golongan.destroy', $data->id) }}" accept-charset="UTF-8">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <a href="{{ route('golongan.edit', $data->id) }}" class="btn btn-warning">Edit</a><td>
                <center>
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
