<?php

use Illuminate\Support\Facades\Route;
use Modules\SingleProduct\Http\Controllers\SingleProductController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('singleproducts', SingleProductController::class)->names('singleproduct');
});
