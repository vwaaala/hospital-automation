<?php

use App\Http\Controllers\Patient\PatientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['guest:admin'])->group(function(){
        Route::view('/login', 'admin.login')->name('login');
        Route::post('/check',[AdminController::class,'check'])->name('check');
    });
    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');
        Route::get('/dashboard',[AdminController::class, 'index'])->name('dashboard');
        Route::view('/doctor/index', 'admin.doctors.index')->name('doctor.index');
        Route::view('/doctor/create', 'admin.doctors.create')->name('doctor.create');
        Route::view('/patient/index', 'admin.patients.index')->name('patient.index');
        Route::view('/patient/create', 'admin.patients.create')->name('patient.create');
    });
});

Route::prefix('patient')->name('patient.')->group(function(){
    Route::middleware(['guest:patient','PreventBackHistory'])->group(function(){
        Route::get('/login', [PatientController::class,'login'])->name('login');
        Route::get('/register', [PatientController::class, 'create'])->name('create');
        Route::post('/create', [PatientController::class,'store'])->name('store');
        Route::post('/check', [PatientController::class,'check'])->name('check');
    });
    Route::middleware(['auth:patient','prevent-back-history'])->group(function(){

        Route::get('/profile', [PatientController::class, 'profile'])->name('profile');
    });
});

Route::prefix('doctor')->name('doctor.')->group(function(){
    Route::middleware(['guest'])->group(function(){
    });
    Route::middleware(['auth'])->group(function(){
    });
});