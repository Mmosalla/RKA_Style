<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Livewire\UserManagement;

Route::middleware(['auth'])->prefix('/admin')->group(function () {
    Route::get('/user_management', UserManagement::class)
        ->name('admin.user_management');
});
