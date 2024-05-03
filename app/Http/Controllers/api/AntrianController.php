<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAntrianRequest;
use App\Http\Resources\AntrianCollection;
use App\Http\Resources\AntrianResource;
use App\Models\Antrian;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AntrianController extends Controller
{
    public function index(Request $request)
    {
        $tanggal = $request->input("tanggal") ?? Carbon::today()->format('Y-m-d');
        $poli = $request->input('poli') ?? 'umum';

        $antrian = Antrian::where("tanggal", $tanggal)->whereHas('poli', function ($query) use ($poli) {
            $query->where('nama', $poli);
        })->with('poli')->get();

        return new AntrianCollection($antrian);
    }

    public function store(CreateAntrianRequest $request)
    {
        $data = $request->validated();
        $currentUser = auth()->user();

        $antrian = new Antrian();
        $antrian->mrn = $currentUser->pasien->mrn;
        $antrian->poli_id = $data['poli_id'];
        $antrian->tanggal = $data['tanggal'];
        $antrian->nomor = Antrian::nomorAntrian($data['poli_id'], $data['tanggal']);
        $antrian->save();

        $newAntrian = $antrian->with('poli')->where('mrn', $currentUser->pasien->mrn)->latest()->first();
        $resource = new AntrianResource($newAntrian);

        return response()->json([
            'data' => $resource,
            'message' => 'Antrian Created'
        ]);
    }
}
