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
    return view('content.dashboard.admin', [
        'activeMenu' => 'dashboard',
    ]);
});

Route::get('/antrian', function () {
    return view('content.antrian.index', [
        'activeMenu'=> 'antrian',
    ]);
});

Route::get('/janji-temu', function () {
    return view('content.janji-temu.index', [
        'activeMenu' => 'janji-temu'
    ]);
});

Route::get('/jadwal-praktek', function () {
    return view('content.jadwal-praktek.index', [
        'activeMenu' => 'jadwal-praktek'
    ]);
});

Route::get('/pasien', function () {
    return view('content.pasien.index', [
        'activeMenu' => 'pasien'
    ]);
});

Route::get('/pasien/new', function () {
    return view('content.pasien.create', [
        'activeMenu' => 'pasien-new'
    ]);
});

Route::get('/dokter', function () {
    return view('content.dokter.index', [
        'activeMenu' => 'dokter'
    ]);
});

Route::get('/dokter/new', function () {
    return view('content.dokter.create', [
        'activeMenu' => 'dokter-new'
    ]);
});

Route::get('/obat', function () {
    return view('content.obat.index', [
        'activeMenu' => 'obat'
    ]);
});

Route::get('/obat/input', function () {
    return view('content.obat.create', [
        'activeMenu' => 'obat-input'
    ]);
});

Route::get('/auth/login', function () {
    return view('auth.login');
});

Route::get('/auth/register', function () {
    return view('auth.register');
});
