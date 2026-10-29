<?php

use Illuminate\Support\Facades\Route;
use Modules\Category\Http\Controllers\CategoryController;
use Modules\Category\Livewire\CategoriesManagement;

Route::middleware(['auth',])->prefix('/admin')->group(function () {
    Route::get('/category' , CategoriesManagement::class)
        ->name('admin.management_categories');
});
