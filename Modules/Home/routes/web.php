<?php

use Illuminate\Support\Facades\Route;
use Modules\Home\Http\Controllers\HomeController;

Route::get('/' ,\Modules\Home\Livewire\Home::class)->name('home');
