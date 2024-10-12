@extends('layouts.template')
@section('judulh1', 'Admin - Peserta')
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
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Ubah Data Peserta</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        
        <form action="{{ route('peserta.update', $peserta->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class=" card-body">
                <div class="form-group">
                    <label for="nama">Nama Peserta</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder=""
                        value="{{ $peserta->nama }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $peserta->email }}">
                </div>
                <div class="form-group">
                    <label for="nohp">Nama Usaha</label>
                    <input type="text" class="form-control" id="nohp" name="nohp" value="{{ $peserta->nohp }}">
                </div>
                <div class="form-group">
                    <label for="nohp">No HP</label>
                    <textarea id="nohp" name="nohp" class=" form-control" rows="4">{{ $peserta->nohp }}</textarea>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-warning float-right">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection