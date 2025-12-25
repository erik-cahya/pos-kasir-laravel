@extends('layouts.master', ['activeMenu' => 'dashboard'])
@section('content')
    <a href="{{ route('ruang.index') }}" class="btn btn-primary mb-3"><i class="fa fa-angle-left"></i> Balik </a>
    <h4>Details Barang</h4>

    <div class="card card-body">
        <div class="table-responsive">
            <table class="table-striped table">
                <tr>
                    <td>ID Barang</td>
                    <td>{{ $dataBarang->id_barang }}</td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td>{{ $dataBarang->nama_kategori }}</td>
                </tr>
                <tr>
                    <td>Nama Barang</td>
                    <td>{{ $dataBarang->nama_barang }}</td>
                </tr>
                <tr>
                    <td>Merk Barang</td>
                    <td>{{ $dataBarang->merk }}</td>
                </tr>
                <tr>
                    <td>Harga Beli</td>
                    <td>{{ $dataBarang->harga_beli }}</td>
                </tr>
                <tr>
                    <td>Harga Jual</td>
                    <td>{{ $dataBarang->harga_jual }}</td>
                </tr>
                <tr>
                    <td>Satuan Barang</td>
                    <td>{{ $dataBarang->satuan_barang }}</td>
                </tr>
                <tr>
                    <td>Stok</td>
                    <td>{{ $dataBarang->stok }}</td>
                </tr>
                <tr>
                    <td>Tanggal Input</td>
                    <td>{{ $dataBarang->tgl_input }}</td>
                </tr>
                <tr>
                    <td>Tanggal Update</td>
                    <td>{{ $dataBarang->tgl_update }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
