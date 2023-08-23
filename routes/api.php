<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\MobilController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::group([
//
//    'middleware' => 'api',
//    'prefix' => 'auth'
//
//], function ($router) {
//
//    Route::post('register', [AuthController::class, 'register']);
//    Route::post('login', [AuthController::class, 'login']);
//    Route::post('logout', [AuthController::class, 'logout']);
//    Route::post('refresh', [AuthController::class, 'refresh']);
//    Route::post('me', [AuthController::class, 'me']);
//});

Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => ['jwt.auth']], function () {
    Route::get('kendaraan/stok', [KendaraanController::class, 'getStok']);
    Route::post('kendaraan/insert', [KendaraanController::class, 'insertKendaraan']);
    Route::put('kendaraan/penjualan/{id}', [KendaraanController::class, 'penjualan']);
    Route::get('kendaraan/laporan-penjualan', [KendaraanController::class, 'laporanPenjualan']);
    Route::get('kendaraan/laporan-penjualan-mobil', [KendaraanController::class, 'laporanPenjualanMobil']);
    Route::get('kendaraan/laporan-penjualan-motor', [KendaraanController::class, 'laporanPenjualanMotor']);

    Route::post('motor/insert', [MotorController::class, 'insertMotor']);
    Route::post('mobil/insert', [MobilController::class, 'insertMobil']);

    Route::post('motor/insert-multiple', [MotorController::class, 'insertMultipleMotor']);
    Route::post('mobil/insert-multiple', [MobilController::class, 'insertMultipleMobil']);

    Route::get('motor/stok', [MotorController::class, 'getStok']);
    Route::get('mobil/stok', [MobilController::class, 'getStok']);
});
