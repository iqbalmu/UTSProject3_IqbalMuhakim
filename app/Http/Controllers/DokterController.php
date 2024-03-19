<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        return view('content.dokter.index', [
            'activeMenu' => 'dokter'
        ]);
    }

    public function create()
    {
        return view('content.dokter.create', [
            'activeMenu' => 'dokter-new'
        ]);
    }
}
