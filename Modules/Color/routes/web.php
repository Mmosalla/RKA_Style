<?php

use Illuminate\Support\Facades\Route;
use Modules\Color\Http\Controllers\ColorController;
use Modules\Color\Livewire\ColorManagement;

Route::middleware(['auth','verified_mobile'])->prefix('/admin')->group(function () {
    Route::get('/color_management/{product}', ColorManagement::class)
        ->name('admin.color_management');
});
