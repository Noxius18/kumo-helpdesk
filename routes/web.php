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

// Route Notifikasi
Route::post('/notifikasi/baca', [DashboardController::class, 'bacaNotifikasi'])->name('notifikasi.baca');

// Route End-Point untuk Admin
Route::middleware(['auth', 'role:Admin'])->group(function() {
    // Dashboard
    Route::get('admin/dashboard', [DashboardController::class, 'dashboardAdmin'])->name('dashboard.admin');

    // Index User
    Route::get('admin/data-admin', [AdminController::class, 'indexAdmin'])->name('dashboard.admin.data-admin');
    Route::get('admin/data-karyawan', [AdminController::class, 'indexKaryawan'])->name('dashboard.admin.data-karyawan');
    Route::get('admin/data-teknisi', [AdminController::class, 'indexTeknisi'])->name('dashboard.admin.data-teknisi');

    // Index Admin untuk list Tiket
    Route::get('admin/data-tiket', [AdminController::class, 'indexTiket'])->name('admin.list-tiket');
    Route::get('admin/data-tiket/{id}', [AdminController::class, 'detailTiket'])->name('admin.tiket.detail');

    // Route untuk laporan tiker
    Route::get('admin/laporan', [AdminController::class, 'formTiket'])->name('admin.laporan');

    // Resources untuk CRUD 
    Route::resource('admin/user', UserController::class, ['as' => 'admin']);
    Route::resource('admin/tiket', TiketController::class, ['as' => 'admin']);
    
    // POST End-Point
    Route::post('admin/data-tiket/{id}/teruskan', [AdminController::class, 'teruskanTiket'])->name('admin.tiket.teruskan');
    Route::post('admin/laporan', [AdminController::class, 'printTiket'])->name('admin.laporan.cetak');

});

// Teknisi
Route::middleware(['auth', 'role:Teknisi'])->group(function() {
    // Dashboard
    Route::get('teknisi/dashboard', [DashboardController::class, 'dashboardTeknisi'])->name('dashboard.teknisi');

    // Index Tiket
    Route::get('teknisi/list-tiket', [TeknisiController::class, 'indexTiket'])->name('teknisi.list-tiket');
    Route::get('teknisi/list-tiket/{id}', [TeknisiController::class, 'detailTiket'])->name('teknisi.tiket.detail');
    Route::get('teknisi/list-note', [TeknisiController::class, 'listNote'])->name('teknisi.list-note');
    
    // Post End-Point
    Route::post('teknisi/list-tiket/{id}', [TeknisiController::class, 'updateStatus'])->name('teknisi.tiket.update');
    Route::post('teknisi/note/tambah', [TeknisiController::class, 'tambahNote'])->name('teknisi.note.tambah');

});

// Karyawan
Route::middleware(['auth', 'role:Karyawan'])->group(function() {
    // Dashboard
    Route::get('karyawan/dashboard', [DashboardController::class, 'dashboardKaryawan'])->name('dashboard.karyawan');

    // Index Tiket
    Route::get('karyawan/list-tiket', [KaryawanController::class, 'indexTiket'])->name('karyawan.list-tiket');
    Route::get('karyawan/list-tiket/{id}', [KaryawanController::class, 'detailTiket'])->name('karyawan.tiket.detail');
    
    // CRUD Tiket
    Route::resource('karyawan/tiket', TiketController::class, ['as' => 'karyawan']);
});