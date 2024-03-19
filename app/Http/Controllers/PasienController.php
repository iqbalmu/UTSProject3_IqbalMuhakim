<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        return view('content.pasien.index', [
            'activeMenu' => 'pasien'
        ]);
    }

    public function create()
    {
        return view('content.pasien.create', [
            'activeMenu' => 'pasien-new'
        ]);
    }
}
