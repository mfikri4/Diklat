<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\JenisDiklatController;
use App\Http\Controllers\KuotaDiklatController;
use App\Http\Controllers\InfoPendaftaranController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//Route Admin
Route::get('register', [AdminController::class, 'register']);
Route::post('register', [AdminController::class, 'postRegister']);
Route::get('login', [AdminController::class, 'login']);
Route::post('login', [AdminController::class, 'postLogin']);
Route::get('logout', [AdminController::class, 'logout']);

// Route Menu Admin
Route::middleware('checkAdmin')->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('/', [AdminController::class, 'index']);
        
        Route::prefix('akun-profil')->group(function(){
            Route::get('/', [ProfilController::class, 'index']);
            Route::get('create', [ProfilController::class, 'create']);
            Route::post('create', [ProfilController::class, 'insert']);
            Route::get('edit/{id}', [ProfilController::class, 'edit']);
            Route::post('edit/{id}', [ProfilController::class, 'update']);
            Route::get('delete/{id}', [ProfilController::class, 'delete']);
        });

        Route::prefix('jenis-diklat')->group(function(){
            Route::get('/', [JenisDiklatController::class, 'index']);
            Route::get('create', [JenisDiklatController::class, 'create']);
            Route::post('create', [JenisDiklatController::class, 'insert']);
            Route::get('edit/{id}', [JenisDiklatController::class, 'edit']);
            Route::post('edit/{id}', [JenisDiklatController::class, 'update']);
            Route::get('delete/{id}', [JenisDiklatController::class, 'delete']);
        });

        Route::prefix('kuota-diklat')->group(function(){
            Route::get('/', [KuotaDiklatController::class, 'index']);
            Route::get('create', [KuotaDiklatController::class, 'create']);
            Route::post('create', [KuotaDiklatController::class, 'insert']);
            Route::get('edit/{id}', [KuotaDiklatController::class, 'edit']);
            Route::post('edit/{id}', [KuotaDiklatController::class, 'update']);
            Route::get('delete/{id}', [KuotaDiklatController::class, 'delete']);
        });

        Route::prefix('info-pendaftaran')->group(function(){
            Route::get('/', [InfoPendaftaranController::class, 'index']);
            Route::get('create', [InfoPendaftaranController::class, 'create']);
            Route::post('create', [InfoPendaftaranController::class, 'insert']);
            Route::get('edit/{id}', [InfoPendaftaranController::class, 'edit']);
            Route::post('edit/{id}', [InfoPendaftaranController::class, 'update']);
            Route::get('delete/{id}', [InfoPendaftaranController::class, 'delete']);
        });

        Route::prefix('profile')->group(function(){
            Route::get('{id}', [AdminController::class, 'edit']);
            Route::post('edit/{id}', [AdminController::class, 'update']);
        });

    });
});