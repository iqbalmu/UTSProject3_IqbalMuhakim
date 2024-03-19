<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AntrianController extends Controller
{
    public function index()
    {
        return view('content.antrian.index', [
            'activeMenu' => 'antrian',
        ]);
    }
}
