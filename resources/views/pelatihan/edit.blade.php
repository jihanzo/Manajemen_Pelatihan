@extends('layouts.template')
@section('judulh1', 'Admin - Pelatihan')
@section('konten')
<div class="col-md-6">
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Ubah Data Pelatihan</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('pelatihan.update', $pelatihan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class=" card-body">
                <div class="form-group">
                    <label for="judul">Judul Pelatihan</label>
                    <input type="text" class="form-control" id="judul" name="judul" placeholder=""
                        value="{{$pelatihan->judul}}">
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{$pelatihan->tanggal}}">
                </div>
                <div class="form-group">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{$pelatihan->lokasi}}">
                </div>
                <div class="form-group">
                    <label for="materi">Materi</label>
                    <input type="text" class="form-control" id="materi" name="materi" value="{{$pelatihan->materi}}">
                </div>
                <div class="form-group">
                    <label for="pemateri">Pemateri</label>
                    <input type="text" class="form-control" id="pemateri" name="pemateri" value="{{$pelatihan->pemateri}}">
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-warning float-right">Ubah</button>
            </div>
        </form>
    </div>
</div>
@endsection