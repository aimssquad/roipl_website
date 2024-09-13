<?php

use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ExportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\EventController;

Route::middleware(['admin_guest'])->prefix('/admin/')->name('admin.')->group(function () {
    Route::controller(LoginController::class)->group(function () {
        Route::get('login', 'index')->name('login');
        Route::post('login', 'login')->name('login.post');
    });

});

Route::middleware(['admin_auth:admin,manager,hr'])->prefix('/admin/')->name('admin.')->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('logout', 'logout')->name('logout');
        Route::get('dashboard', 'dashboard')->name('dashboard');
        Route::get('profile', 'profile')->name('profile');
    });

    Route::group(['middleware' => ['role:super-admin|admin|manager|hr']], function () {
    Route::resource('roles', RoleController::class)->except(['show']);
    Route::get('roles/{roleId}/give-permission', [RoleController::class, 'givePermission'])->name('roles.give-permission');
    Route::put('roles/{roleId}/give-permission', [RoleController::class, 'givePermissionRole'])->name('roles.save-permission');
    // Route::controller(RoleController::class)->group(function () {
    //     Route::get('role/permissions/{roleId}', 'givePermission')->name('roles.give-permission');
    // });
    Route::resource('abouts', AboutController::class)->except(['show']);
    Route::resource('brands', BrandController::class)->except(['show']);
    Route::resource('events', EventController::class)->except(['show']);
    Route::resource('permissions', PermissionController::class)->except(['show']);
    Route::resource('users', UserController::class)->except(['show']);
    Route::resource('contacts', ContactController::class)->except(['show']);
    Route::post('/contacts/update-status', [ContactController::class, 'updateStatus'])->name('contacts.updateStatus');
    Route::post('/export-table-data', [ExportController::class, 'exportTableData'])->name('exportTableData');
});
});


