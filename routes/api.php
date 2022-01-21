<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\InfoDiklatController;
use App\Http\Controllers\API\InfoKuotaController;
use App\Http\Controllers\API\InfoPendaftaranController;
use App\Http\Controllers\API\AkunController;

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
Route::resource('/akun', AkunController::class);
Route::resource('/info-diklat', InfoDiklatController::class);
Route::resource('/info-kuota', InfoKuotaController::class);
Route::resource('/info-pendaftaran', InfoPendaftaranController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
