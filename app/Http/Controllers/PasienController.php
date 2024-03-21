<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class PasienController extends Controller
{
    public function index()
    {
        $data = User::has('pasien')->where('role_id', 4)->get();
        return view('content.pasien.index', [
            'activeMenu' => 'pasien',
            'data' => $data
        ]);
    }

    public function create($step = 'account')
    {
        $page = 'content.pasien.create.' . $step;
        return view($page, [
            'activeMenu' => 'pasien-new',
            'pasiens' => User::select('username', 'nama', 'id_user')->where('role_id', 4)->get(),
            'step' => $step
        ]);
    }

    public function show($idPasien)
    {
        $pasien = User::has('pasien')->where('id_user', $idPasien)->first();
        return view('content.pasien.show', [
            'activeMenu' => 'pasien',
            'pasien' => $pasien,
        ]);
    }

    public function edit($idPasien)
    {
        $pasien = User::has('pasien')->where('id_user', $idPasien)->first();
        return view('content.pasien.edit', [
            'activeMenu' => 'pasien',
            'pasien' => $pasien,
        ]);
    }

    public function storeAccount(Request $request)
    {
        $validatedData = $request->validate([
            "nama" => 'required',
            "username" => 'required|unique:users',
            "password" => 'required',
            "email" => 'required|unique:users,email',
            "nomor_hp" => 'required|unique:users,nomor_hp'
        ]);

        $user = new User();
        $user->nama = $validatedData['nama'];
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->nomor_hp = $validatedData['nomor_hp'];
        $user->role_id = 4; //role pasien
        $user->status_aktif = 'aktif';

        $user->save();

        notyf()->position('y', 'top')->addSuccess('Data Pasien Berhasil Ditambahkan');
        return redirect()->route('pasien.create.account');
    }

    public function storeProfile(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|unique:pasiens',
            'nik' => 'required|unique:pasiens',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'profesi' => 'required',
            'tinggi_badan' => 'required',
            'berat_badan' => 'required',
        ]);

        $pasien = new Pasien();
        $pasien->nik = $validatedData['nik'];
        $pasien->jenis_kelamin = $validatedData['jenis_kelamin'];
        $pasien->alamat = $validatedData['alamat'];
        $pasien->profesi = $validatedData['profesi'];
        $pasien->tinggi_badan = $validatedData['tinggi_badan'];
        $pasien->berat_badan = $validatedData['berat_badan'];
        $pasien->user_id = $validatedData['user_id'];

        $pasien->save();

        notyf()->position('y', 'top')->addSuccess('Profile Pasien Berhasil Ditambahkan');
        return redirect()->route('pasien.create.profile');
    }

    public function update(Request $request, $idUser)
    {
        $validatedData = $request->validate([
            "nama" => 'required',
            "username" => 'required',
            "password" => 'nullable',
            "email" => 'required',
            "nomor_hp" => 'required',
            'nik' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'profesi' => 'required',
            'tinggi_badan' => 'required',
            'berat_badan' => 'required',
        ]);

        try {
            DB::transaction(function () use ($validatedData, $idUser) {
                $user = User::find($idUser);

                $password = $validatedData['password'] ? Hash::make($validatedData['password']) : $user->password;

                $user->nama = $validatedData['nama'];
                $user->username = $validatedData['username'];
                $user->email = $validatedData['email'];
                $user->password = $password;
                $user->nomor_hp = $validatedData['nomor_hp'];
                $user->save();

                $pasien = Pasien::where('user_id', $idUser)->first();
                $pasien->nik = $validatedData['nik'];
                $pasien->jenis_kelamin = $validatedData['jenis_kelamin'];
                $pasien->alamat = $validatedData['alamat'];
                $pasien->profesi = $validatedData['profesi'];
                $pasien->tinggi_badan = $validatedData['tinggi_badan'];
                $pasien->berat_badan = $validatedData['berat_badan'];
                $pasien->save();

                notyf()->position('y', 'top')->addSuccess('Data Pasien Berhasil Diperbarui');
            });
        } catch (\Exception $exception) {
            DB::rollBack();
            dd('Update Data Pasien Failed: ' . $exception->getMessage());

            notyf()->position('y', 'top')->addSuccess('Data Pasien Gagal Diperbarui');
        }

        return redirect()->back();
    }
}
