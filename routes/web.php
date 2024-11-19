<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home']);
Route::get('/features', [PageController::class, 'features']);
Route::get('/support', [PageController::class, 'support']);
Route::get('/download', [PageController::class, 'download']);
Route::get('/pricing', [PageController::class, 'pricing']);
