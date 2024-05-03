<?php

use App\Http\Controllers\api\AntrianController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\DokterController;
use App\Http\Controllers\api\JadwalPraktekController;
use App\Http\Controllers\api\PoliController;
use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Auth Api
Route::controller(AuthController::class)->prefix('auth')->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});

Route::middleware('verifyJwt')->group(function () {
    Route::controller(UserController::class)->prefix('user')->group(function () {
        Route::get('/profile', 'getProfile');
        Route::put('/profile', 'updateProfile');
        Route::put('/change-password', 'changePassword');
    });

    Route::controller(AntrianController::class)->group(function () {
        Route::get('/antrian', 'index');
        Route::post('/antrian', 'store');
    });

    Route::get('/poli', [PoliController::class, 'index']);

    Route::get('/dokter', [DokterController::class, 'index']);
    Route::get('/dokter/{id}', [DokterController::class, 'show']);

    Route::get('/jadwal-praktek', [JadwalPraktekController::class, 'index']);

    Route::delete('/auth/logout', [AuthController::class, 'logout']);
});
