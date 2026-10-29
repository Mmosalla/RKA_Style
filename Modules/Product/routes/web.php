<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\ProductController;
use Modules\Product\Livewire\ProductManagement;

Route::middleware(['auth'])->prefix('/admin')->group(function () {
Route::get('/product_management' , ProductManagement::class)
    ->name('admin.product_management');
});
