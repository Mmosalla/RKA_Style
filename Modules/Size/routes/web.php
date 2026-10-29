<?php

use Illuminate\Support\Facades\Route;
use Modules\Size\Http\Controllers\SizeController;
use Modules\Size\Livewire\SizeManagement;

Route::middleware(['auth'])->prefix('/admin')->group(function () {
    Route::get('/size_management/{product}' , SizeManagement::class)
        ->name('admin.size_management');
});
