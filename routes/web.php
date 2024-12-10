<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\TeknisiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TiketController;

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
    // Dashboard
    Route::get('admin/dashboard', [DashboardController::class, 'dashboardAdmin'])->name('dashboard.admin');

    // Index User
    Route::get('admin/data-admin', [UserController::class, 'indexAdmin'])->name('dashboard.admin.data-admin');
    Route::get('admin/data-karyawan', [UserController::class, 'indexKaryawan'])->name('dashboard.admin.data-karyawan');
    Route::get('admin/data-teknisi', [UserController::class, 'indexTeknisi'])->name('dashboard.admin.data-teknisi');

    // Index Admin untuk list Tiket
    Route::get('admin/data-tiket', [AdminController::class, 'indexTiket'])->name('admin.tiket.list-tiket');
    
    // Resources untuk CRUD 
    Route::resource('admin/user', UserController::class, ['as' => 'admin']);
    Route::resource('admin/tiket', TiketController::class, ['as' => 'admin']);
    
    // POST End-Point
    Route::post('admin/data-tiket/{id}/teruskan', [AdminController::class, 'teruskanTiket'])->name('admin.tiket.teruskan');
    
});

Route::middleware(['auth', 'role:Karyawan'])->group(function() {
    // Dashboard
    Route::get('karyawan/dashboard', [DashboardController::class, 'dashboardKaryawan'])->name('dashboard.karyawan');

    // Index Tiket
    Route::get('karyawan/list-tiket', [TiketController::class, 'tiketKaryawan'])->name('karyawan.list-tiket');

    // CRUD Tiket
    Route::resource('karyawan/tiket', TiketController::class, ['as' => 'karyawan']);
});