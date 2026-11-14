<?php

use Illuminate\Support\Facades\Route;
use Modules\PaymentCallback\Http\Controllers\PaymentCallbackController;

Route::middleware(['auth'])->get('payment_callback', \Modules\PaymentCallback\Livewire\PaymentCallback::class)
    ->name('payment-callback');
