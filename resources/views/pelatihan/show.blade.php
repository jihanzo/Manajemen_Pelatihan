@extends('layouts.template')
@section('judulh1', 'Admin - Pelatihan')
@section('konten')
<div class="col-md-6">
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your
            input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data Pelatihan</h3>
        </div>
        <!-- /.card-header -->
        <div class=" card-body">
            <table>
                <tr>
                    <th>Judul Pelatihan</th>
                    <td>:</td>
                    <td>{{ $data[0]->judul }}</td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>:</td>
                    <td>{{ $data[0]->tanggal }}</td>
                </tr>
                <tr>
                    <th>Lokasi</th>
                    <td>:</td>
                    <td>{{ $data[0]->lokasi }}</td>
                </tr>
                <tr>
                    <th>Materi</th>
                    <td>:</td>
                    <td>{{ $data[0]->materi}}</td>
                </tr>
                <tr>
                    <th>Pemateri</th>
                    <td>:</td>
                    <td>{{ $data[0]->pemateri}}</td>
                </tr>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>
@endsection