<?php

namespace Database\Seeders;

use App\Models\Dokter;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table("polis")->insert([
            [
                "nama"=> "umum",
                "deskripsi"=> "poliklinik umum",
            ],
            [
                "nama"=> "gizi",
                "deskripsi"=> "poliklinik gizi",
            ],
            [
                "nama"=> "bedah",
                "deskripsi"=> "poliklinik bedah",
            ],
        ]);

        $user = User::create([
            "email" => "dokter@dokter.com",
            'password' => Hash::make('dokter'),
            'nama' => 'Dr. Muhakim',
            'nomor_hp' => '088942123421',
            'role_id' => 3,
        ]);

        $dokter = new Dokter();
        $dokter->user_id = $user->id_user;
        $dokter->nomor_str = '123456789012345';
        $dokter->nomor_sip = '123456789012345';
        $dokter->foto = 'sample.jpeg';
        $dokter->spesialisasi = 'Bedah Hati';
        $dokter->poli_id = 1;
        $dokter->save();

        $user2 = User::create([
            "email" => "dokter2@dokter.com",
            'password' => Hash::make('dokter'),
            'nama' => 'Dr. Joko',
            'nomor_hp' => '088942123400',
            'role_id' => 3,
        ]);

        $dokter2 = new Dokter();
        $dokter2->user_id = $user2->id_user;
        $dokter2->nomor_str = '123456789012345';
        $dokter2->nomor_sip = '123456789012345';
        $dokter2->foto = 'sample.jpeg';
        $dokter2->spesialisasi = 'Bedah Hati';
        $dokter2->poli_id = 1;
        $dokter2->save();
    }
}
