<?php

namespace Database\Seeders;

use App\Models\BarangModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'id_barang' => 'BR001',
                'id_kategori' => 1,
                'nama_barang' => 'Pensil',
                'merk' => 'Faber Castell',
                'harga_beli' => 14000,
                'harga_jual' => 10000,
                'satuan_barang' => 'PCS',
                'stok' => '100',
                'tgl_input' => '2025-12-25 10:30:00',
                'tgl_update' => '2025-12-25 10:30:00',
            ],
            [
                'id_barang' => 'BR003',
                'id_kategori' => 2,
                'nama_barang' => 'Buku',
                'merk' => 'Sinar Dunia',
                'harga_beli' => 24000,
                'harga_jual' => 30000,
                'satuan_barang' => 'PCS',
                'stok' => '140',
                'tgl_input' => '2025-12-25 10:30:00',
                'tgl_update' => '2025-12-25 10:30:00',
            ],
            [
                'id_barang' => 'BR023',
                'id_kategori' => 2,
                'nama_barang' => 'Kertas',
                'merk' => 'Paper One',
                'harga_beli' => 50000,
                'harga_jual' => 34000,
                'satuan_barang' => 'RIM',
                'stok' => '440',
                'tgl_input' => '2025-12-25 10:30:00',
                'tgl_update' => '2025-12-25 10:30:00',
            ],
        ];
        foreach ($datas as $data) {
            BarangModel::create($data);
        }
    }
}
