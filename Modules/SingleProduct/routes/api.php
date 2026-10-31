<?php

use Illuminate\Support\Facades\Route;
use Modules\SingleProduct\Http\Controllers\SingleProductController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('singleproducts', SingleProductController::class)->names('singleproduct');
});
