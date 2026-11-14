<?php

use Illuminate\Support\Facades\Route;
use Modules\RolePermission\Http\Controllers\RolePermissionController;
use Modules\RolePermission\Livewire\Permission;
use Modules\RolePermission\Livewire\Roles;

Route::middleware(['auth', 'verified_mobile'])->prefix('/admin')->group(function () {
    Route::get('/role', Roles::class)
        ->name('admin.role');
    Route::get('/permission', Permission::class)
        ->name('admin.permission');
});
