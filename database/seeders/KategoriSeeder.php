<?php

namespace Database\Seeders;

use App\Models\KategoriModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'nama_kategori' => 'ATK',
                'tgl_input' => '2025-12-25 10:30:00'
            ],
            [
                'nama_kategori' => 'Sabun',
                'tgl_input' => '2025-12-25 10:30:00'
            ],
            [
                'nama_kategori' => 'Makanan',
                'tgl_input' => '2025-05-11 10:30:00'
            ],
            [
                'nama_kategori' => 'Minuman',
                'tgl_input' => '2025-06-15 10:30:00'
            ],
        ];

        foreach ($datas as $data) {
            KategoriModel::create($data);
        }
    }
}
