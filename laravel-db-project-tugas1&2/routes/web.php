<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;


Route::get('/', [MahasiswaController::class, 'index']);
Route::post('/store', [MahasiswaController::class, 'store']);


