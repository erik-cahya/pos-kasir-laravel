@extends('layouts.master', ['activeMenu' => 'dashboard'])
@section('content')
    <h4>Kategori</h4>
    @if (session('alert'))
        <div class="alert {{ session('alert.class') }}">
            <p>{{ session('alert.message') }}</p>
        </div>
    @endif

    @if (isset($id))
        <form method="POST" action="{{ route('kategori.update', $id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <table>
                <tr>
                    <td style="width:25pc;">
                        <input type="text" class="form-control" required name="nama_kategori" value="{{ $nama_kategori->nama_kategori }}">
                    </td>
                    <td style="padding-left:10px;">
                        <button id="tombol-simpan" class="btn btn-primary"><i class="fa fa-edit"></i>Ubah Data</button>
                    </td>
                </tr>
            </table>
        </form>
    @else
        <form method="POST" action="{{ route('kategori.store') }}" enctype="multipart/form-data">
            @csrf
            <table>
                <tr>
                    <td style="width:25pc;">
                        <input type="text" class="form-control" required name="nama_kategori" placeholder="Masukan Kategori Barang Baru">
                    </td>
                    <td style="padding-left:10px;">
                        <button id="tombol-simpan" class="btn btn-primary"><i class="fa fa-plus"></i>Insert Data</button>
                    </td>
                </tr>
            </table>
        </form>
    @endif

    <div class="card card-body mt-4">
        <div class="table-responsive">
            <table class="table-bordered table-striped table-sm table" id="example1">
                <thead>
                    <tr style="background:#DFF0D8;color:#333;">
                        <th>No.</th>
                        <th>Kategori</th>
                        <th>Tanggal Input</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategori as $data_kategori)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data_kategori->nama_kategori }}</td>
                            <td>{{ $data_kategori->tgl_input }}</td>
                            <td>
                                <a href="{{ route('kategori.edit', $data_kategori->id_kategori) }}"><button class="btn btn-warning">Edit</button></a>

                                <form class="d-inline" action="{{ route('kategori.destroy', $data_kategori->id_kategori) }}" method="POST" onsubmit="return confirm('Hapus Data Kategori?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">
                                        Hapus
                                    </button>
                                </form>

                                {{-- <a href="{{ route('kategori.destroy') }}" onclick="javascript:return confirm('Hapus Data Kategori ?');">
                                    <button class="btn btn-danger">Hapus</button>
                                </a> --}}
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
