<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Livewire\Login;
use Modules\Auth\Livewire\Register;

Route::middleware(['guest'])->group(function () {
    Route::get('/register' , Register::class)
        ->name('auth.register');
    Route::get('/login' , Login::class)
        ->name('auth.login');
});


Route::middleware(['auth'])->get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('auth.logout');
