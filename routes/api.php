<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\DokterController;
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
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);

// User Api
Route::get('/user/profile', [UserController::class, 'getProfile']);
Route::patch('/user/profile', [UserController::class, 'updateProfile']);
Route::patch('/user/change-passwor', [UserController::class, 'changePassword']);

// Dokter Api
Route::get('/dokter', [DokterController::class, 'index']);

