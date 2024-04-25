<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RekamMedik;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class PasienController extends Controller
{
    public function index()
    {
        $data = User::has('pasien')->where('role_id', 5)->get();
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
            'pasiens' => User::select('nama', 'id_user', 'email')->where('role_id', 5)->get(),
            'step' => $step
        ]);
    }

    public function show($idPasien)
    {
        $pasien = User::has('pasien')->where('id_user', $idPasien)->first();
        $mrn = $pasien->pasien->mrn;
        $rekamMediks = RekamMedik::where('mrn', $mrn)->orderByDesc('created_at')->get();

        return view('content.pasien.show', [
            'activeMenu' => 'pasien',
            'pasien' => $pasien,
            'rekamMediks' => $rekamMediks,
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

    // public function create()
    // {
    //     return view('content.pasien.create', [
    //         'activeMenu' => 'pasien-new',
    //         'pasiens' => User::select('nama', 'id_user', 'email')->where('role_id', 5)->get(),
    //     ]);
    // }

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         "nama" => 'required',
    //         "password" => 'required|min:8',
    //         "email" => 'required|unique:users',
    //         "nomor_hp" => 'required|unique:users|min:10',
    //         'nik' => 'required|unique:pasiens|size:16',
    //         'jenis_kelamin' => 'required',
    //         'alamat' => 'required',
    //         'profesi' => 'required'
    //     ]);

    //     try {
    //         DB::transaction(function () use ($validatedData) {
    //             $user = new User();
    //             $user->nama = $validatedData['nama'];
    //             // $user->username = $validatedData['username'];
    //             $user->email = $validatedData['email'];
    //             $user->password = Hash::make($validatedData['password']);
    //             $user->nomor_hp = $validatedData['nomor_hp'];
    //             $user->role_id = 3;
    //             $user->save();

    //             $dokter = new Dokter();
    //             $dokter->nomor_str = $validatedData['nomor_str'];
    //             $dokter->nomor_sip = $validatedData['nomor_sip'];
    //             $dokter->spesialisasi = $validatedData['spesialisasi'];
    //             $dokter->user_id = $user->id_user;
    //             $dokter->save();

    //             notyf()->position('y', 'top')->addSuccess('Data Dokter Berhasil Ditambahkan');
    //         });
    //     } catch (\Exception $exception) {
    //         DB::rollBack();

    //         if (file_exists($filePath)) {
    //             unlink($filePath);
    //         }

    //         dd('Update Data Pasien Failed: ' . $exception->getMessage());
    //         notyf()->position('y', 'top')->addSuccess('Data Dokter Gagal Ditambahkan');
    //     }

    //     return redirect()->back();
    // }

    public function storeAccount(Request $request)
    {
        $validatedData = $request->validate([
            "nama" => 'required',
            // "username" => 'required|unique:users',
            "password" => 'required|min:8',
            "email" => 'required|unique:users,email',
            "nomor_hp" => 'required|unique:users,nomor_hp|min:10'
        ]);

        $user = new User();
        $user->nama = $validatedData['nama'];
        // $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->nomor_hp = $validatedData['nomor_hp'];
        $user->role_id = 5; //role pasien
        $user->status_aktif = 'aktif';

        $user->save();

        notyf()->position('y', 'top')->addSuccess('Data Pasien Berhasil Ditambahkan');
        return redirect()->route('pasien.create.account');
    }

    public function storeProfile(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|unique:pasiens',
            'nik' => 'required|unique:pasiens|size:16',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'profesi' => 'required',
            // 'tinggi_badan' => 'required',
            // 'berat_badan' => 'required',
        ]);

        $pasien = new Pasien();
        $pasien->nik = $validatedData['nik'];
        $pasien->jenis_kelamin = $validatedData['jenis_kelamin'];
        $pasien->alamat = $validatedData['alamat'];
        $pasien->profesi = $validatedData['profesi'];
        // $pasien->tinggi_badan = $validatedData['tinggi_badan'];
        // $pasien->berat_badan = $validatedData['berat_badan'];
        $pasien->user_id = $validatedData['user_id'];

        $pasien->save();

        notyf()->position('y', 'top')->addSuccess('Profile Pasien Berhasil Ditambahkan');
        return redirect()->route('pasien.create.profile');
    }

    public function update(Request $request, $idUser)
    {
        $validatedData = $request->validate([
            "nama" => 'required',
            // "username" => 'required',
            "password" => 'nullable',
            "email" => 'required',
            "nomor_hp" => 'required',
            'nik' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'profesi' => 'required',
            // 'tinggi_badan' => 'required',
            // 'berat_badan' => 'required',
        ]);

        try {
            DB::transaction(function () use ($validatedData, $idUser) {
                $user = User::find($idUser);

                // if ($validatedData['email'] == $user->email) {
                //     return back()->withInput()->withErrors(['email' => 'email exists']);
                // }

                $password = $validatedData['password'] ? Hash::make($validatedData['password']) : $user->password;

                $user->nama = $validatedData['nama'];
                // $user->username = $validatedData['username'];
                $user->email = $validatedData['email'];
                $user->password = $password;
                $user->nomor_hp = $validatedData['nomor_hp'];
                $user->save();

                $pasien = Pasien::where('user_id', $idUser)->first();
                $pasien->nik = $validatedData['nik'];
                $pasien->jenis_kelamin = $validatedData['jenis_kelamin'];
                $pasien->alamat = $validatedData['alamat'];
                $pasien->profesi = $validatedData['profesi'];
                // $pasien->tinggi_badan = $validatedData['tinggi_badan'];
                // $pasien->berat_badan = $validatedData['berat_badan'];
                $pasien->save();

                notyf()->position('y', 'top')->addSuccess('Data Pasien Berhasil Diperbarui');
            });
        } catch (\Exception $exception) {
            DB::rollBack();
            notyf()->position('y', 'top')->addError('Data Pasien Gagal Diperbarui');
        }

        return redirect()->back();
    }

    public function pasienMrn($userId, $mrnId)
    {

        $rMedik = RekamMedik::where('id_rekam_medik', $mrnId)->with('pemeriksaan', 'dokter', 'resep')->first();

        return view('content.rekam-medik.index', [
            'activeMenu' => 'pasien',
            'rMedik' => $rMedik
        ]);
    }
}
