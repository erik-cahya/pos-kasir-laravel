<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RuangController extends Controller
{

    public function generateKodeBarang()
    {
        $lastKode = BarangModel::orderBy('id_barang', 'desc')
            ->value('id_barang');
        if ($lastKode) {
            $number = (int) substr($lastKode, 2);
            $number++;
        } else {
            $number = 1;
        }
        $newKode = 'BR' . str_pad($number, 4, '0', STR_PAD_LEFT);

        return $newKode;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['idBarang'] = $this->generateKodeBarang();
        $data['kategori'] = KategoriModel::select('id_kategori', 'nama_kategori')->get();
        $data['barang'] = BarangModel::get();
        $data['totalStok'] = BarangModel::sum('stok');
        $data['totalHargaBeli'] = BarangModel::sum('harga_beli');
        $data['totalHargaJual'] = BarangModel::sum('harga_jual');
        $data['countBarangKosong'] = BarangModel::where('stok', '<=', 3)->count();

        return view('ruang.index', $data);
    }


    public function stok_edit(Request $request, $id)
    {


        BarangModel::where('id', $id)->update([
            'stok' => $request->restok
        ]);

        $alert = [
            'message' => 'Stock Berhasil Diubah !',
            'class' => 'alert-success',
        ];

        return redirect()->route('ruang.index')->with('alert', $alert);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        BarangModel::create([
            'id_barang' => $request->id,
            'id_kategori' => $request->kategori,
            'nama_barang' => $request->nama,
            'merk' => $request->merk,
            'harga_beli' => $request->beli,
            'harga_jual' => $request->jual,
            'satuan_barang' => $request->satuan,
            'stok' => $request->stok,
            'tgl_input' => Carbon::createFromFormat('d-M-Y - H:i:s', $request->tgl)->format('Y-m-d H:i:s'),
            'tgl_update' => Carbon::createFromFormat('d-M-Y - H:i:s', $request->tgl)->format('Y-m-d H:i:s'),
        ]);

        $alert = [
            'message' => 'Tambah Data Berhasil !',
            'class' => 'alert-success',
        ];

        return redirect()->route('ruang.index')->with('alert', $alert);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['dataBarang'] = BarangModel::where('id', $id)->join('kategori', 'kategori.id_kategori', '=',  'barang.id_kategori')->first();
        return view('ruang.details', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        BarangModel::destroy($id);

        $alert = [
            'message' => 'Hapus Data Berhasil !',
            'class' => 'alert-danger',
        ];

        return redirect()->route('ruang.index')->with('alert', $alert);
    }
}
