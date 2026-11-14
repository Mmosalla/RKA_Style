<?php

use Illuminate\Support\Facades\Route;
use Modules\Cart\Http\Controllers\CartController;
use Modules\Cart\Livewire\Cart;

Route::middleware(['auth'])->get('/cart', Cart::class)
    ->name('cart.show');
