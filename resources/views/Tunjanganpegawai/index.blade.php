@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
            <div class="panel panel-heading"><h1><center>TUNJANGAN PEGAWAI</center></h1></div>
                <a href="{{url('/tunjangpegawai/create')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus "></span>Tambah Data</a><br>
                <div class="panel-body">
                <div class="form-group"><center>
                </center></div>

	<table class="table table-bordered">
		<tr class="bg-info">
			<th><center>No</center></th>
			<th><center>Kode Tunjangan</center></th>
			<th><center>NIP</center></th>
			<th><center>Nama Pegawai</center></th>
			<th><center>Jabatan</center></th>
			<th><center>Golongan</center></th>
			<th><center>Status</center></th>
			<th><center>Jumlah Anak</center></th>
			<th><center>Besar Uang Tunjangan Pegawai</center></th>
			<th colspan="2"><center>Action</center></th>
		</tr>

		<?php $no=1;?>
		@foreach ($tunjang as $paradise)
		<tr>
			<td><center>{{ $no++ }}</center></td>
			<td><center>{{ $paradise->tunjangan->kode_tunjangan}}</center></td>
			<td><center>{{ $paradise->pegawaii->nip}}</center></td>
			<td><center>{{ $paradise->pegawaii->user->name}}</center></td>
			<td><center>{{ $paradise->pegawaii->jabatan->nama_jabatan}}</center></td>
			<td><center>{{ $paradise->pegawaii->golongan->nama_golongan}}</center></td>
			<td><center>{{ $paradise->tunjangan->status}}</center></td>
			<td><center>{{ $paradise->tunjangan->jumlah_anak }}</center></td>
			<td><center>Rp. {{ number_format($paradise->tunjangan->besaran_uang )}}</center></td>
			<td><center><form method="POST" action="{{ route('tunjangpegawai.destroy', $paradise->id) }}" accept-charset="UTF-8">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <a href="{{ route('tunjangpegawai.edit', $paradise->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil">Edit</a><td>
                
                <span class="glyphicon glyphicon-trash"><input type="submit" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus Data??');" value="Delete">
			</center></td>
		</tr>
		@endforeach
	</table>
</div>

</a>
</form>
</center>
</td>
</tr>
</table>
</div>
</div>
</div>
</div>
</html>
@stop