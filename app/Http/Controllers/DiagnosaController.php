<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Obat;
use App\Models\Pemeriksaan;
use App\Models\RekamMedik;
use App\Models\Resep;
use App\Models\ResepDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DiagnosaController extends Controller
{
    public function index()
    {
        return view('content.diagnosa.index', [
            'activeMenu' => 'diagnosa',
            'users' => User::select('nama', 'id_user', 'email')->where('role_id', 5)->get(),
            'obats' => Obat::all(),
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // validasi request

        // current user (dokter)
        $userId = Auth::user()->id_user;
        $dokter = Dokter::select('id_dokter')->where('user_id', $userId)->first();

        try {
            DB::transaction(function () use ($request, $dokter) {
                // store data pemeriksaan
                $pemeriksaan = new Pemeriksaan();
                $pemeriksaan->suhu = $request->suhu;
                $pemeriksaan->tekanan_darah = $request->tekanan_darah;
                $pemeriksaan->nadi = $request->nadi;
                $pemeriksaan->pernapasan = $request->pernapasan;
                $pemeriksaan->tinggi = $request->tinggi;
                $pemeriksaan->berat = $request->berat;
                $pemeriksaan->laboratorium = $request->laboratorium;
                $pemeriksaan->rontgen = $request->rontgen;
                $pemeriksaan->ctscan = $request->ctscan;
                $pemeriksaan->usg = $request->usg;
                $pemeriksaan->mri = $request->mri;
                $pemeriksaan->save();

                // store data resep | resep + detail
                $resep = new Resep();
                $resep->keterangan = $request->keterangan;
                $resep->save();

                // dd($resep->id_resep);

                foreach ($request->obat as $index => $value) {
                    $resepDetail = new ResepDetail();
                    $resepDetail->resep_id = $resep->id_resep;
                    $resepDetail->obat_id = $request->obat[$index];
                    $resepDetail->dosis = $request->dosis[$index];
                    $resepDetail->frekuensi = $request->frekuensi[$index];
                    $resepDetail->durasi = $request->durasi[$index];
                    $resepDetail->metode = $request->metode[$index];
                    $resepDetail->syarat = $request->syarat[$index];
                    $resepDetail->save();
                }

                // store data rekam medik
                $rekamMedik = new RekamMedik();
                $rekamMedik->keluhan_utama = $request->keluhan;
                $rekamMedik->riwayat_kesehatan = $request->riwayat_kesehatan;
                $rekamMedik->riwayat_kesehatan = $request->riwayat_kesehatan;
                $rekamMedik->diagnosis = $request->diagnosis;
                $rekamMedik->penatalaksanaan = $request->penatalaksanaan;
                $rekamMedik->catatan_dokter = $request->catatan_dokter;
                $rekamMedik->pasien_id = $request->pasien_id;
                $rekamMedik->dokter_id = $dokter->id_dokter;
                $rekamMedik->pemeriksaan_id = $pemeriksaan->id_pemeriksaan;
                $rekamMedik->resep_id = $resep->id_resep;
                $rekamMedik->save();

                notyf()->position('y', 'top')->addSuccess('Data Berhasil Ditambahkan');
            });
        } catch (\Throwable $exception) {
            DB::rollBack();
            dd('Update Data Pasien Failed: ' . $exception->getMessage());
            notyf()->position('y', 'top')->addSuccess('Data Gagal Ditambahkan');
        }

        return redirect()->back();
    }
}
