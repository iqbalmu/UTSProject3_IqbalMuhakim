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
Route::get('/antrian', [AntrianController::class, 'index']);

// Janji-Temu Routes
Route::get('/janji-temu', [JanjiTemuController::class, 'index']);

// Jadwal-Praktek Routes
Route::get('/jadwal-praktek', [JadwalPraktekController::class, 'index']);

// Pasien Routes
Route::get('/pasien', [PasienController::class, 'index']);
Route::get('/pasien/new', [PasienController::class, 'create']);

// Dokter Routes
Route::get('/dokter', [DokterController::class, 'index']);
Route::get('/dokter/new', [DokterController::class, 'create']);

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
