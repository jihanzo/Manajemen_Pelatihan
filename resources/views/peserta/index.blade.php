@extends('layouts.template')
@section('tambahanCSS')
<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- Toastr -->
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
@endsection

@section('judulh1','Admin - Peserta')
@section('judulh3','Pesertas')
@section('konten')

<div class="col-md-4">

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Input Peserta</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('peserta.store') }}" method="POST">
            @csrf

            <div class=" card-body">
                <div class="form-group">
                    <label for="nama">Nama Peserta</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="">
                </div>                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="nama_usaha">Nama Usaha</label>
                    <input type="text" class="form-control" id="nama_usaha" name="nama_usaha">
                </div>
                <div class="form-group">
                    <label for="nohp">No HP</label>
                    <input type="text" class="form-control" id="nohp" name="nohp">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">Simpan</button>
            </div>
        </form>
    </div>

</div>

<div class="col-md-8">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Data Peserta</h3>
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Nama Usaha</th>
                        <th>No HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($data as $dt)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dt->nama }}</td>                        
                        <td>{{ $dt->email }}</td>
                        <td>{{ $dt->nama_usaha }}</td>
                        <td>{{ $dt->nohp }}</td>
                        <td>
                            <div class="btn-group">
                                <a type="button" class="btn btn-warning" href="{{ route('peserta.edit',$dt->id) }}">
                                    <i class=" fas fa-edit"></i>
                                </a>
                                <form action="{{ route('peserta.destroy', $dt->id)}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">
                                                                <i class=" fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                <!-- <a type="button" class="btn btn-success" href="{{ route('peserta.show',$dt->id) }}">
                                    <i class=" fas fa-eye"></i>
                                </a> -->
                            </div>

                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
</div>
@endsection

@section('tambahanJS')
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@endsection

@section('tambahScript')
<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        "responsive": true,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});

@if($message = Session::get('success'))
toastr.success("{{ $message}}");
@elseif($message = Session::get('updated'))
toastr.warning("{{ $message}}");
@endif
</script>
@endsection
