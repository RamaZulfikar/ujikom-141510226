@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
            <div class="panel panel-heading"><h1><center>TUNJANGAN</center></h1></div>
                <a href="{{url('/tunjangan/create')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Tambah Data</a><br>
                <div class="panel-body">
                <div class="form-group"><center>
                </center></div>
                <table class="table table-bordered">
                    <tr class="bg-info">
                        <th><center>No.</center></th>
                        <th><center>Kode Tunjangan</center></th>
                        <th><center>Jabatan</center></th>
                        <th><center>Golongan</center></th>
                        <th><center>Status</center></th>
                        <th><center>Jumlah anak</center></th>
                        <th><center>BesaranUang</center></th>
                        <th colspan="2"><centerkategori>Actions</center></th>
                    </tr>
                    @php
                    $no=1;
                    @endphp
                    <tbody>
                        @foreach ($tunjang as $beak)
                            <tr>
                                <td><center>{{ $no++ }}</center></td>
                                <td><center>{{ $beak->kode_tunjangan }}</center></td>
                                <td><center>{{ $beak->jabatan->nama_jabatan }}</center></td>
                                <td><center>{{ $beak->golongan->nama_golongan }}</center></td>
                                <td><center>{{ $beak->status }}</center></td>
                                <td><center>{{ $beak->jumlah_anak }}</center></td>
                                <td><center>{{ $beak->besaran_uang }}</center></td>
                                <td><center>
                 <form method="POST" action="{{ route('tunjangan.destroy', $beak->id) }}" accept-charset="UTF-8">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <a href="{{ route('tunjangan.edit', $beak->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil">Edit</a><td>
                <center>
                <span class="glyphicon glyphicon-trash">
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
