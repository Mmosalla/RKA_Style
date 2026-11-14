<?php

use Illuminate\Support\Facades\Route;
use Modules\PaymentCallback\Http\Controllers\PaymentCallbackController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('paymentcallbacks', PaymentCallbackController::class)->names('paymentcallback');
});
