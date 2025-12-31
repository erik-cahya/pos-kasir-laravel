@extends('layouts.master', ['activeMenu' => 'dashboard'])
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h6 class="pt-2"><i class="fas fa-cubes"></i> Jumlah Barang</h6>
                </div>
                <div class="card-body">
                    <center>
                        <h1>{{ $countBarang }}</h1>
                    </center>
                </div>
                <div class="card-footer">
                    <a href='index.php?page=barang'>Tabel
                        Barang <i class='fa fa-angle-double-right'></i></a>
                </div>
            </div>
            <!--/grey-card -->
        </div><!-- /col-md-3-->
        <!-- STATUS cardS -->
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h6 class="pt-2"><i class="fas fa-chart-bar"></i> Stok Barang</h6>
                </div>
                <div class="card-body">
                    <center>
                        <h1>{{ $countStock }}</h1>
                    </center>
                </div>
                <div class="card-footer">
                    <a href='index.php?page=barang'>Tabel
                        Barang <i class='fa fa-angle-double-right'></i></a>
                </div>
            </div>
            <!--/grey-card -->
        </div><!-- /col-md-3-->
        <!-- STATUS cardS -->
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h6 class="pt-2"><i class="fas fa-upload"></i> Telah Terjual</h6>
                </div>
                <div class="card-body">
                    <center>
                        <h1>200</h1>
                    </center>
                </div>
                <div class="card-footer">
                    <a href='index.php?page=laporan'>Tabel
                        laporan <i class='fa fa-angle-double-right'></i></a>
                </div>
            </div>
            <!--/grey-card -->
        </div><!-- /col-md-3-->
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h6 class="pt-2"><i class="fa fa-bookmark"></i> Kategori Barang</h6>
                </div>
                <div class="card-body">
                    <center>
                        <h1>{{ $countKategori }}</h1>
                    </center>
                </div>
                <div class="card-footer">
                    <a href='index.php?page=kategori'>Tabel
                        Kategori <i class='fa fa-angle-double-right'></i></a>
                </div>
            </div>
            <!--/grey-card -->
        </div><!-- /col-md-3-->
    </div>
@endsection
