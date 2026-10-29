<?php

use Illuminate\Support\Facades\Route;
use Modules\Category\Livewire\CategoriesManagement;
use Modules\Gallery\Http\Controllers\GalleryController;
use Modules\Gallery\Livewire\Gallery;

Route::middleware(['auth'])->prefix('/admin')->group(function () {
    Route::get('/galley_management/{product}', Gallery::class)
        ->name('admin.galley_management');
});
