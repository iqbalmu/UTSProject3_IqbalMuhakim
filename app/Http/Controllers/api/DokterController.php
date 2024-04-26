<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DokterCollection;
use App\Http\Resources\DokterResource;
use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index() {
        $data = Dokter::with('poli')->get();
        return new DokterCollection($data);
    }
}
