<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DokterCollection;
use App\Http\Resources\DokterResource;
use App\Models\Dokter;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        $data = Dokter::with('poli')->get();
        return new DokterCollection($data);
    }

    public function show($id)
    {
        $data = Dokter::where('id_dokter', $id)->with('poli', 'jadwal')->first();

        if (!$data) {
            throw new HttpResponseException(response([
                'errrors' => 'Data Not Found !!'
            ], 404));
        }

        return new DokterResource($data);
    }
}
