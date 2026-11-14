<?php

use Illuminate\Support\Facades\Route;
use Modules\CallBack\Http\Controllers\CallBackController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('callbacks', CallBackController::class)->names('callback');
});
