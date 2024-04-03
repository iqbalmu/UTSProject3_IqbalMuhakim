<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Pasien;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AntrianController extends Controller
{
    public function index()
    {
        return view('content.antrian.index', [
            'activeMenu' => 'antrian',
            'pasiens' => User::select('nama', 'email', 'id_user')->where('role_id', 5)->get(),
            'antrian' => Antrian::has('pasien')->get()
        ]);
    }

    public function store(Request $request)
    {
        $pasien = Pasien::where('user_id', $request->user_id)->first();
        $antrian = new Antrian();
        $antrian->status = 'menunggu';
        $antrian->pasien_id = $pasien->id_pasien;

        $antrian->save();

        notyf()->position('y', 'top')->addSuccess('Antrian Pasien Berhasil Ditambahkan');
        return redirect()->back();
    }

    public function update(Request $request)
    {

        $antrian = Antrian::find($request->id);

        $antrian->status = $request->status;
        $antrian->save();

        notyf()->position('y', 'top')->addSuccess('Status Antrian Berhasil Diperbarui');
        return redirect()->back();
    }
}
