<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\MengajarController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SiswaController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('/guru', GuruController::class)->except('show');
Route::resource('/siswa', SiswaController::class)->except('show');
Route::resource('/jurusan', JurusanController::class)->except('show');
Route::resource('/mapel', MapelController::class)->except('show');
Route::resource('/kelas', KelasController::class)->except('show');
Route::resource('/siswa', SiswaController::class)->except('show');
Route::resource('/mengajar', MengajarController::class)->except('show');
Route::resource('/nilai', NilaiController::class)->except('show');

Route::middleware('guest')->prefix('/login')->group(function() {
    Route::get('/', [AuthController::class, 'viewLogin'])->name('viewLogin');
    Route::post('/', [AuthController::class, 'login'])->name('login');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// TODO
// - diffForHumans created_at & updated_at
// - more spesifik column on relation
// - auth, penyesuaian NilaiController
// - auth, pembatasan pada role tertentu

// - kelas
// - mengajar
// - nilai
// - siswa