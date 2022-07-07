<?php

use App\Http\Controllers\Patient\PatientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['guest'])->group(function(){
        Route::view('/login', 'admin.login')->name('login');
        Route::get('/dashboard',[AdminController::class, 'index'])->name('dashboard');
        Route::view('/doctor/index', 'admin.doctors.index')->name('doctor.index');
        Route::view('/doctor/create', 'admin.doctors.create')->name('doctor.create');
        Route::view('/patient/index', 'admin.patients.index')->name('patient.index');
        Route::view('/patient/create', 'admin.patients.create')->name('patient.create');
    });
    Route::middleware(['auth'])->group(function(){

    });
});

Route::prefix('patient')->name('patient.')->group(function(){
    Route::middleware(['guest:web','prevent-back-history'])->group(function(){
        Route::get('/login', [PatientController::class,'login'])->name('login');
        Route::get('/register', [PatientController::class, 'create'])->name('create');
        Route::post('/create', [PatientController::class,'store'])->name('store');
        Route::post('/check', [PatientController::class,'check'])->name('check');
    });
    Route::middleware(['auth:web','prevent-back-history'])->group(function(){
        Route::view('/profile', 'patient.profile')->name('profile');
//        Route::get('/profile', [PatientController::class, 'profile'])->name('profile');
    });
});

Route::prefix('doctor')->name('doctor.')->group(function(){
    Route::middleware(['guest'])->group(function(){
    });
    Route::middleware(['auth'])->group(function(){
    });
});