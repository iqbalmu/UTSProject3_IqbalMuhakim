<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JanjiTemuController extends Controller
{
    public function index()
    {
        return view('content.janji-temu.index', [
            'activeMenu' => 'janji-temu'
        ]);
    }
}
