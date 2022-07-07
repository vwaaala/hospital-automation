<?php
use Illuminate\Support\Facades\Route;

Route::prefix('doctor')->name('doctor.')->group(function(){
    Route::middleware(['guest'])->group(function(){
    });
    Route::middleware(['auth'])->group(function(){
    });
});