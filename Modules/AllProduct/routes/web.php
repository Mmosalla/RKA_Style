<?php

use Illuminate\Support\Facades\Route;
use Modules\AllProduct\Http\Controllers\AllProductController;
use Modules\AllProduct\Livewire\Allproduct;

Route::get('/all_product', Allproduct::class)
    ->name('all_product');

