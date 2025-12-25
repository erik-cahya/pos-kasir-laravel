<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['kategori'] = KategoriModel::get();

        return view('kategori.index', $data);
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
        // dd($request->all());

        KategoriModel::create([
            'nama_kategori' => $request->nama_kategori,
            'tgl_input' => now()
        ]);

        $alert = [
            'message' => 'Tambah Data Berhasil !',
            'class' => 'alert-success',
        ];

        return redirect()->route('kategori.index')->with('alert', $alert);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['id'] = $id;
        $data['nama_kategori'] = KategoriModel::where('id_kategori', $id)->first();
        $data['kategori'] = KategoriModel::get();

        return view('kategori.index', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        KategoriModel::where('id_kategori', $id)->update([
            'nama_kategori' => $request->nama_kategori,
        ]);

        $alert = [
            'message' => 'Edit Data Berhasil !',
            'class' => 'alert-warning',
        ];

        return redirect()->route('kategori.index')->with('alert', $alert);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        KategoriModel::destroy($id);

        $alert = [
            'message' => 'Hapus Data Berhasil !',
            'class' => 'alert-danger',
        ];

        return redirect()->route('kategori.index')->with('alert', $alert);
    }
}
