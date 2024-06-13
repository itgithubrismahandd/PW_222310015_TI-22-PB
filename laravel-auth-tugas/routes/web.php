<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('signIn');
})->name('login'); //untuk mengembalikan ke login

Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', function () {
    return view('signUp');
});
Route::post('/register', [AuthController::class, 'register']);

Route::get('/admin', function(){
    return view('admin');
})->middleware('auth'); //middleware untuk menghalangi user yang blm login, kalau tidak pakai middleware user bisa membuka melalui link

Route::post('/logout', [AuthController::class, 'logout']);
