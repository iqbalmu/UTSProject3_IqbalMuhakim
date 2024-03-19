<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JadwalPraktekController extends Controller
{
    public function index()
    {
        return view('content.jadwal-praktek.index', [
            'activeMenu' => 'jadwal-praktek'
        ]);
    }
}
