<?php

use App\Http\Controllers\AntrianController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\JadwalPraktekController;
use App\Http\Controllers\JanjiTemuController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
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

// Dashboard Routes
Route::get('/', [DashboardController::class, 'index']);

// Antrian Routes
Route::get('/antrian', [AntrianController::class, 'index'])->name('antrian.index');
Route::post('/antrian', [AntrianController::class, 'store'])->name('antrian.store');
Route::put('/antrian', [AntrianController::class, 'update'])->name('antrian.update');

// Janji-Temu Routes
Route::get('/janji-temu', [JanjiTemuController::class, 'index'])->name('temu.index');
Route::post('/janji-temu', [JanjiTemuController::class, 'store'])->name('temu.store');
Route::put('/janji-temu', [JanjiTemuController::class, 'update'])->name('temu.update');

// Jadwal-Praktek Routes
Route::get('/jadwal-praktek', [JadwalPraktekController::class, 'index']);

// Pasien Routes
Route::get('/pasien', [PasienController::class, 'index'])->name('pasien.index');
Route::get('/pasien/new/{step?}', [PasienController::class, 'create'])->name('pasien.create');
Route::get('/pasien/{id}/detail', [PasienController::class, 'show'])->name('pasien.show');
Route::get('/pasien/{id}/edit', [PasienController::class, 'edit'])->name('pasien.edit');
Route::post('/pasien/new/account', [PasienController::class, 'storeAccount'])->name('pasien.create.account');
Route::post('/pasien/new/profile', [PasienController::class, 'storeProfile'])->name('pasien.create.profile');
Route::put('/pasien/{id}', [PasienController::class, 'update'])->name('pasien.update');

// Dokter Routes
Route::get('/dokter', [DokterController::class, 'index'])->name('dokter.index');
Route::get('/dokter/new', [DokterController::class, 'create'])->name('dokter.create');
Route::get('/dokter/{id}/edit', [DokterController::class, 'edit'])->name('dokter.edit');
Route::get('/dokter/{id}/detail', [DokterController::class, 'show'])->name('dokter.show');
Route::post('/dokter', [DokterController::class, 'store'])->name('dokter.store');
Route::put('/dokter/{id}', [DokterController::class, 'update'])->name('dokter.update');

// Obat Routes
Route::get('/obat', [ObatController::class, 'index'])->name('obat.index');
Route::get('/obat/input', [ObatController::class, 'create'])->name('obat.create');
Route::get('/obat/{id}/detail', [ObatController::class, 'show'])->name('obat.show');
Route::get('/obat/{id}/edit', [ObatController::class, 'edit'])->name('obat.edit');
Route::post('/obat', [ObatController::class, 'store'])->name('obat.store');
Route::post('/obat/{id}', [ObatController::class, 'update'])->name('obat.update');
Route::delete('/obat', [ObatController::class, 'remove'])->name('obat.remove');

// Authentication Routes
Route::get('/auth/login', [AuthController::class, 'login']);
Route::get('/auth/register', [AuthController::class, 'register']);
