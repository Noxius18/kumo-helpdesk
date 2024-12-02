<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\TeknisiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('auth.login');
});

Route::get('/login', [LoginController::class, 'showLogin'])->name('auth.login');
Route::post('/login', [LoginController::class, 'authLogin']);
Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');

// Ruute End-Point untuk Admin
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('dashboard.admin')
->middleware('auth', 'role:Admin');

// Route End-Point untuk Teknisi
Route::get('/teknisi/dashboard', [TeknisiController::class, 'index'])->name('dashboard.teknisi')
->middleware('auth', 'role:Teknisi');;

// Route End-Point untuk Karyawan
Route::get('/karyawan/dashboard', [KaryawanController::class, 'index'])->name('dashboard.karyawan')
->middleware('auth', 'role:Karyawan');