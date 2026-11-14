<?php

use Illuminate\Support\Facades\Route;
use Modules\SingleProduct\Http\Controllers\SingleProductController;

Route::get('/product/{product}/{slug}' , \Modules\SingleProduct\Livewire\SingleProduct::class)
    ->name('single.product');
