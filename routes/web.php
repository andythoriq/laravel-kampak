<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/guru', GuruController::class);
Route::resource('/siswa', SiswaController::class);