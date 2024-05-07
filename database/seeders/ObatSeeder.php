<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("obats")->insert([
            [
                'kategori' => 'cat 1',
                'nama' => 'obat 1',
                'harga' => 1000,
                'stok' => 'tersedia',
                'penyedia' => 'PT. PNP',
                'kadaluarsa' => '2025/12/12',
                'user_id' => 4,
            ],
            [
                'kategori' => 'cat 2',
                'nama' => 'obat 2',
                'harga' => 1000,
                'stok' => 'tersedia',
                'penyedia' => 'PT. PNP',
                'kadaluarsa' => '2025/12/12',
                'user_id' => 4,
            ],
            [
                'kategori' => 'cat 3',
                'nama' => 'obat 3',
                'harga' => 1000,
                'stok' => 'tersedia',
                'penyedia' => 'PT. PNP',
                'kadaluarsa' => '2025/12/12',
                'user_id' => 4,
            ],
        ]);
    }
}
