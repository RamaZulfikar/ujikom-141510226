@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
            <div class="panel panel-heading"><h1><center>KATEGORI LEMBUR</center></h1></div>
                <a href="{{url('/kategori/create')}}" class="btn btn-success">Tambah Data</a><br>
                <div class="panel-body">
                <div class="form-group"><center>
                </center></div>
                <table class="table table-bordered">
                    <tr class="bg-info">
                        <th><center>No.</center></th>
                        <th><center>Kode Lembur</center></th>
                        <th><center>Jabatan</center></th>
                        <th><center>Golongan</center></th>
                        <th><center>Besaran Uang</center></th>
                        <th colspan="2"><center>Actions</center></th>
                    </tr>
                    @php
                    $no=1;
                    @endphp 
                    <tbody>
                        @foreach ($kategorii as $dadah)
                            <tr>
                                <td><center>{{ $no++ }}</center></td>
                                <td><center>{{ $dadah->kode_lembur }}</center></td>
                                <td><center>{{ $dadah->jabatan->nama_jabatan }}</center></td>
                                <td><center>{{ $dadah->golongan->nama_golongan }}</center></td>
                                <td><center>{{ $dadah->besaran_uang }}</center></td>
                                <td><center>
                 <form method="POST" action="{{ route('kategori.destroy', $dadah->id) }}" accept-charset="UTF-8">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <a href="{{ route('kategori.edit', $dadah->id) }}" class="btn btn-warning">Edit</a><td>
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
