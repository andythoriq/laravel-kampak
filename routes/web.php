<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\SiswaController;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::resource('guru', GuruController::class)->except('show');
Route::resource('siswa', SiswaController::class)->except('show');
Route::resource('jurusan', JurusanController::class)->except('show');
Route::resource('mapel', MapelController::class)->except('show');
Route::resource('kelas', KelasController::class)->except('show');
Route::resource('siswa', SiswaController::class)->except('show');