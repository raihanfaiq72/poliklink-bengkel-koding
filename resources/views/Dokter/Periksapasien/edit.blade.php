@extends('Layout.header')

@section('main')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Pemeriksaan Pasien</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Daftar Pasien</a></li>
                        <li class="breadcrumb-item active">Edit Pemeriksaan</li>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Detail Pemeriksaan Pasien</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ url('dokter/periksa-pasien/' . $pemeriksaan->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_pasien">Nama Pasien</label>
                                    <input type="text" class="form-control" value="{{ $periksa->pasien->nama }}" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_periksa">Tanggal Pemeriksaan</label>
                                    <input type="text" class="form-control" value="{{ $pemeriksaan->tgl_periksa }}" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="catatan">Catatan Pemeriksaan</label>
                                    <textarea name="catatan" class="form-control" rows="3" placeholder="Masukkan catatan pemeriksaan">{{ $pemeriksaan->catatan }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="biaya_periksa">Biaya Pemeriksaan</label>
                                    <input type="number" name="biaya_periksa" class="form-control" value="{{ $pemeriksaan->biaya_periksa }}">
                                </div>

                                <div class="form-group">
                                    <label for="obat">Pilih Obat</label>
                                    <select name="obat[]" class="form-control select2" multiple="multiple" data-placeholder="Pilih Obat" style="width: 100%;">
                                        @foreach ($obat as $obat_item)
                                            <option value="{{ $obat_item->id }}">{{ $obat_item->nama_obat }} - Rp {{ number_format($obat_item->harga, 0, ',', '.') }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan Pemeriksaan</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
