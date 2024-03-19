<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        return view('content.obat.index', [
            'activeMenu' => 'obat'
        ]);
    }

    public function create()
    {
        return view('content.obat.create', [
            'activeMenu' => 'obat-input'
        ]);
    }
}
