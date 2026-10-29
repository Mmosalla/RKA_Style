<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Livewire\Login;
use Modules\Auth\Livewire\Register;
use Modules\Auth\Livewire\ResetPassword;

Route::middleware(['guest'])->group(function () {
    Route::get('/register' , Register::class)
        ->name('register');
    Route::get('/login' , Login::class)
        ->name('login');
    Route::get('/reset_password' , ResetPassword::class)
        ->name('reset_password');
});


Route::middleware(['auth'])->get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
