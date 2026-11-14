<?php

use Illuminate\Support\Facades\Route;
use Modules\Dashboard\Http\Controllers\DashboardController;
use Modules\Dashboard\Livewire\Dashboard;

Route::middleware(['auth','verified_mobile'])->prefix('/admin')->group(function () {
    Route::get('/dashboard', Dashboard::class)
        ->name('admin.dashboard');
});
