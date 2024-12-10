<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\TeknisiController;
use App\Http\Controllers\UserController;
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
Route::middleware(['auth', 'role:Admin'])->group(function() {
    /*
    |   GET End-Point
    */
    // Dashboard
    Route::get('admin/dashboard', [DashboardController::class, 'dashboardAdmin'])->name('dashboard.admin');
    
    // Index User
    Route::get('admin/data-admin', [UserController::class, 'indexAdmin'])->name('dashboard.admin.data-admin');
    Route::get('admin/data-karyawan', [UserController::class, 'indexKaryawan'])->name('dashboard.admin.data-karyawan');
    Route::get('admin/data-teknisi', [UserController::class, 'indexTeknisi'])->name('dashboard.admin.data-teknisi');

    // POST End-Point
    Route::resource('admin/user', UserController::class, ['as' => 'admin']);
    // Route::post('admin/tambah-user', [UserController::class, 'store'])->name('admin.tambah-user');
});

// Route End-Point untuk Teknisi
Route::get('/teknisi/dashboard', [TeknisiController::class, 'index'])->name('dashboard.teknisi')
->middleware('auth', 'role:Teknisi');;

// Route End-Point untuk Karyawan
Route::get('/karyawan/dashboard', [KaryawanController::class, 'index'])->name('dashboard.karyawan')
->middleware('auth', 'role:Karyawan');