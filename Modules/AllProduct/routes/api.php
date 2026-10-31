<?php

use Illuminate\Support\Facades\Route;
use Modules\AllProduct\Http\Controllers\AllProductController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('allproducts', AllProductController::class)->names('allproduct');
});
