<?php

use Illuminate\Support\Facades\Route;
use Modules\CallBack\Http\Controllers\CallBackController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('callbacks', CallBackController::class)->names('callback');
});
