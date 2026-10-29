<?php

use Illuminate\Support\Facades\Route;
use Modules\Dashboard\Http\Controllers\DashboardController;
use Modules\Dashboard\Livewire\Dashboard;

Route::middleware('auth')->prefix('/admin')->group(function () {
    Route::get('/dashboard', Dashboard::class)
        ->name('admin.dashboard');
});
