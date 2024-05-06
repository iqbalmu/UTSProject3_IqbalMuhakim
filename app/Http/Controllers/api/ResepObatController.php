<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResepResource;
use App\Models\Resep;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ResepObatController extends Controller
{
    public function show($id)
    {
        $pasien = Auth::user()->pasien;

        $data = Resep::whereHas('rmedik', function (Builder $query) use ($pasien) {
            $query->where('mrn', $pasien->mrn);
        })->with('details')->first();

        return new ResepResource($data);
    }
}
