<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DoctorController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['guest:admin'])->group(function () {
        Route::view('/login', 'admin.login')->name('login');
        Route::post('/check', [AdminController::class, 'check'])->name('check');
    });
    Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function () {
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

        Route::prefix('doctor')->name('doctor.')->group(function (){
            Route::get('/index', [DoctorController::class, 'index'])->name('index');
            Route::get('/create', [DoctorController::class, 'create'])->name('create');
            Route::post('/store', [DoctorController::class, 'store'])->name('store');
        });
        Route::view('/patient/index', 'admin.patients.index')->name('patient.index');
        Route::view('/patient/create', 'admin.patients.create')->name('patient.create');
    });
});