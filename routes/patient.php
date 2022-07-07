<?php

use App\Http\Controllers\Patient\PatientController;
use Illuminate\Support\Facades\Route;

Route::prefix('patient')->name('patient.')->group(function () {
    Route::middleware(['guest:patient', 'PreventBackHistory'])->group(function () {
        Route::get('/login', [PatientController::class, 'login'])->name('login');
        Route::get('/register', [PatientController::class, 'create'])->name('create');
        Route::post('/create', [PatientController::class, 'store'])->name('store');
        Route::post('/check', [PatientController::class, 'check'])->name('check');
    });
    Route::middleware(['auth:patient', 'PreventBackHistory'])->group(function () {

        Route::get('/profile', [PatientController::class, 'profile'])->name('profile');
    });
});