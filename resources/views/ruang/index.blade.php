@extends('layouts.master', ['activeMenu' => 'dashboard'])
@section('content')
    <h4>Data Barang</h4>

    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-primary btn-md mr-2" data-toggle="modal" data-target="#myModal">
        <i class="fa fa-plus"></i> Insert Data</button>
    <a href="index.php?page=barang&stok=yes" class="btn btn-warning btn-md mr-2">
        <i class="fa fa-list"></i> Sortir Stok Kurang</a>
    <a href="index.php?page=barang" class="btn btn-success btn-md">
        <i class="fa fa-refresh"></i> Refresh Data</a>
    <div class="clearfix"></div>
    <br />

    @if ($countBarangKosong !== 0)
        <div class='alert alert-warning'>
            <span class='glyphicon glyphicon-info-sign'></span> Ada <span style='color:red'>{{ $countBarangKosong }}</span> barang yang Stok tersisa sudah kurang dari 3 items. silahkan pesan lagi !!
            <span class='pull-right'><a href='index.php?page=barang&stok=yes'>Cek Barang <i class='fa fa-angle-double-right'></i></a></span>
        </div>
    @endif

    @if (session('alert'))
        <div class="alert {{ session('alert.class') }}">
            <p>{{ session('alert.message') }}</p>
        </div>
    @endif
    <!-- view barang -->
    <div class="card card-body">
        <div class="table-responsive">
            <table class="table-bordered table-striped table-sm table" id="example1">
                <thead>
                    <tr style="background:#DFF0D8;color:#333;">
                        <th>No.</th>
                        <th>ID Barang</th>
                        <th>Kategori</th>
                        <th>Nama Barang</th>
                        <th>Merk</th>
                        <th>Stok</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Satuan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($barang as $data_barang)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>#{{ $data_barang->id_barang }}</td>
                            <td>{{ $data_barang->id_kategori }}</td>
                            <td>{{ $data_barang->nama_barang }}</td>
                            <td>{{ $data_barang->merk }}</td>

                            <td>
                                @if ($data_barang->stok == 0)
                                    <button class="btn btn-danger btn-sm"> Habis</button>
                                @else
                                    {{ $data_barang->stok }}
                                @endif

                            </td>
                            <td>Rp.{{ number_format($data_barang->harga_beli ?? 0, 0, ',', '.') }},-</td>
                            <td>Rp.{{ number_format($data_barang->harga_jual ?? 0, 0, ',', '.') }},-</td>
                            <td>{{ $data_barang->satuan_barang }}</td>

                            <td>
                                @if ($data_barang->stok <= 3)
                                    <form method="POST" class="d-inline" action="fungsi/edit/edit.php?stok=edit">
                                        <input type="text" name="restok" class="form-control">
                                        <input type="hidden" name="id" value="#"
                                            class="form-control">
                                        <button class="btn btn-primary btn-sm mt-2">
                                            Restok
                                        </button>
                                    </form>

                                    <form class="d-inline" action="{{ route('ruang.destroy', $data_barang->id) }}" method="POST" onsubmit="return confirm('Hapus Data Barang?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm mt-2">
                                            Hapus bara
                                        </button>
                                    </form>
                                @else
                                    <a href="{{ route('ruang.show', $data_barang->id) }}"><button
                                            class="btn btn-primary btn-sm">Details</button></a>

                                    <a href="index.php?page=barang/edit&barang=#"><button
                                            class="btn btn-warning btn-sm">Edit</button></a>

                                    <form class="d-inline" action="{{ route('ruang.destroy', $data_barang->id) }}" method="POST" onsubmit="return confirm('Hapus Data Barang?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Hapus
                                        </button>
                                    </form>
                                @endif

                            </td>
                        </tr>
                    @endforeach

                </tbody>

                <tfoot>
                    <tr>
                        <th colspan="5">Total </td>
                        <th>{{ $totalStok }}</td>
                        <th>Rp.{{ number_format($totalHargaBeli ?? 0, 0, ',', '.') }}-</td>
                        <th>Rp.{{ number_format($totalHargaJual ?? 0, 0, ',', '.') }}-</td>
                        <th colspan="2" style="background:#ddd"></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- tambah barang MODALS-->
    <!-- Modal -->

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content" style=" border-radius:0px;">
                <div class="modal-header" style="background:#285c64;color:#fff;">
                    <h5 class="modal-title"><i class="fa fa-plus"></i> Tambah Barang</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{ route('ruang.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <table class="table-striped bordered table">
                            <tr>
                                <td>ID Barang</td>
                                <td><input type="text" readonly="readonly" required value="{{ $idBarang }}" class="form-control" name="id"></td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td>
                                    <select name="kategori" class="form-control" required>
                                        <option value="" selected disabled>Pilih Kategori</option>
                                        @foreach ($kategori as $dataKategori)
                                            <option value="{{ $dataKategori->id_kategori }}">{{ $dataKategori->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Barang</td>
                                <td><input type="text" placeholder="Nama Barang" required class="form-control" name="nama"></td>
                            </tr>
                            <tr>
                                <td>Merk Barang</td>
                                <td><input type="text" placeholder="Merk Barang" required class="form-control" name="merk"></td>
                            </tr>
                            <tr>
                                <td>Harga Beli</td>
                                <td><input type="number" placeholder="Harga beli" required class="form-control" name="beli"></td>
                            </tr>
                            <tr>
                                <td>Harga Jual</td>
                                <td><input type="number" placeholder="Harga Jual" required class="form-control" name="jual"></td>
                            </tr>
                            <tr>
                                <td>Satuan Barang</td>
                                <td>
                                    <select name="satuan" class="form-control" required>
                                        <option value="#">Pilih Satuan</option>
                                        <option value="PCS">PCS</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Stok</td>
                                <td><input type="number" required Placeholder="Stok" class="form-control" name="stok"></td>
                            </tr>
                            <tr>
                                <td>Tanggal Input</td>
                                <td><input type="text" required readonly="readonly" class="form-control" value="{{ now()->format('d-M-Y - H:m:s') }}" name="tgl"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Insert Data</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
