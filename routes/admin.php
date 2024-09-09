<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoginController;


Route::middleware(['admin_auth:admin'])->prefix('/admin/')->name('admin.')->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('logout', 'logout')->name('logout');
        Route::get('dashboard', 'dashboard')->name('dashboard');
        Route::get('profile', 'profile')->name('profile');
    });
});

Route::middleware(['admin_guest'])->prefix('/admin/')->name('admin.')->group(function () {
    Route::controller(LoginController::class)->group(function () {
        Route::get('login', 'index')->name('login');
        Route::post('login', 'login')->name('login.post');
    });
});
