<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('content.dashboard.admin');
});

Route::get('/antrian', function () {
    return view('content.antrian.index');
});

Route::get('/janji-temu', function () {
    return view('content.janji-temu.index');
});

Route::get('/pasien', function () {
    return view('content.pasien.index');
});

Route::get('/dokter', function () {
    return view('content.dokter.index');
});

Route::get('/jadwal-praktek', function () {
    return view('content.jadwal-praktek.index');
});

Route::get('/obat', function () {
    return view('content.obat.index');
});
