<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index']);

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('loginAttempt', [AuthController::class, 'loginAttempt'])->name('loginAttempt');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['prefix'  => 'admin'], function (){
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/screenings', [AdminController::class, 'getScreening'])->name('admin.screenings');
    Route::post('/customers', [AdminController::class, 'storeData'])->name('admin.customers');
    Route::get('/export', [AdminController::class, 'exportToPdf'])->name('admin.export');

});