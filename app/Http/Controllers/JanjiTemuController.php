<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use App\Models\User;
use Illuminate\Http\Request;

class JanjiTemuController extends Controller
{
    public function index()
    {
        return view('content.janji-temu.index', [
            'activeMenu' => 'janji-temu',
            'pasiens' => User::has('pasien')->get(),
            'dokters' => User::has('dokter')->get(),
            'data' => Kunjungan::all()
        ]);
    }

    public function store(Request $request)
    {
        $kunjungan = new Kunjungan();
        $kunjungan->pasien_id = $request->pasien_id;
        $kunjungan->dokter_id = $request->dokter_id;
        $kunjungan->tanggal = $request->tanggal;
        $kunjungan->waktu = $request->waktu;
        $kunjungan->status = 'menunggu';

        $kunjungan->save();

        notyf()->position('y', 'top')->addSuccess('Janji Temu Pasien Berhasil Dibuat');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $kunjungan = Kunjungan::find($request->id);
        $kunjungan->status = $request->status;
        $kunjungan->save();

        notyf()->position('y', 'top')->addSuccess('Status Janji Temu Pasien Berhasil Diperbarui');
        return redirect()->back();
    }
}
