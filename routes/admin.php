<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['guest:admin'])->group(function () {
        Route::view('/login', 'admin.login')->name('login');
        Route::post('/check', [AdminController::class, 'check'])->name('check');
    });
    Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function () {
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::view('/doctor/index', 'admin.doctors.index')->name('doctor.index');
        Route::view('/doctor/create', 'admin.doctors.create')->name('doctor.create');
        Route::view('/patient/index', 'admin.patients.index')->name('patient.index');
        Route::view('/patient/create', 'admin.patients.create')->name('patient.create');
    });
});