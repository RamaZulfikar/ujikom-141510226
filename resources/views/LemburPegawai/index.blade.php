@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
            <div class="panel panel-heading"><h1><center>Lembur Pegawai</center></h1></div>
                <a href="{{url('/Lembur/create')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Tambah Data</a><br>
                <div class="panel-body">
                <div class="form-group"><center>
                </center></div>
                <table class="table table-bordered">
                    <tr class="bg-info">
                        <th><center>No.</center></th>
                        <th><center>Kode Lembur</center></th>
                        <th colspan="2"><center>Nama Pegawai Dan NIP</center></th>
                        <th colspan="2"><center>Golongan dan jabatan</center></th>
                        <th><center>Jumlah Jam</center></th>
                        <th colspan="2"><centerkategori>Actions</center></th>
                    </tr>
                    @php
                    $no=1;
                    @endphp
                    <tbody>
                        @foreach ($lembur as $sota)
                            <tr>
                                <td><center>{{ $no++ }}</center></td>
                                <td><center>{{ $sota->kategoribur->kode_lembur }}</center></td>
                                <td><center>{{ $sota->pegawai->User->name }}</center></td>
                                <td><center>{{ $sota->pegawai->nip }}</center></td>
                                <td><center>{{ $sota->pegawai->golongan->nama_golongan }}</center></td>
                                <td><center>{{ $sota->pegawai->jabatan->nama_jabatan }}</center></td>
                                <td><center>{{ $sota->jumlah_jam }}</center></td>
                                <td><center>
                 <form method="POST" action="{{ route('Lembur.destroy', $sota->id) }}" accept-charset="UTF-8">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <a href="{{ route('Lembur.edit', $sota->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Edit</a><td>
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
