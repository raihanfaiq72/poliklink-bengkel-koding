@extends('Layout.header')

@section('main')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Validation</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Validation</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Pemeriksaan Pasien</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="namapoli">Nama Pasien</label>
                                    <input type="text" class="form-control " value="{{$periksa->pasien->nama}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="namapoli">Tanggal Periksa</label>
                                    <input type="text" class="form-control " value="{{$periksa->pasien->nama}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="namapoli">Catatan</label>
                                    <input type="text" class="form-control " value="{{$periksa->pasien->nama}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="namapoli">Biaya</label>
                                    <input type="text" class="form-control " value="{{$periksa->pasien->nama}}" disabled>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection