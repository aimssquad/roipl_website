<?php

use App\Http\Controllers\Admin\BrandLogoController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\EventFolderController;
use App\Http\Controllers\Admin\EventFolderImageController;
use App\Http\Controllers\Admin\EventImageController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VisionnaireController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\ExportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\VisionnaireDetailController;
use App\Http\Controllers\Admin\ImageController;




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
        Route::resource('permissions', PermissionController::class)->except(['show']);
        Route::resource('users', UserController::class)->except(['show']);
        Route::resource('contacts', ContactController::class)->except(['show']);
        Route::resource('careers', CareerController::class)->except(['show']);
        Route::resource('announcements', AnnouncementController::class)->except(['show']);
        Route::post('/contacts/update-status', [ContactController::class, 'updateStatus'])->name('contacts.updateStatus');
        Route::post('/careers/update-status', [CareerController::class, 'updateStatus'])->name('careers.updateStatus');
        Route::post('/export-table-data', [ExportController::class, 'exportTableData'])->name('exportTableData');
        Route::resource('brandlogos', BrandLogoController::class)->except(['show']);
        Route::resource('teams', TeamController::class)->except(['show']);

        Route::resource('events', EventController::class)->except(['show']);
        Route::get('addEvent/{id}', [EventController::class, 'addEvent'])->name('add-event');
        Route::delete('/events/images/{image}', [EventImageController::class, 'destroy'])->name('events.images.destroy');

        // Admin routes for EventFolder
        Route::get('events/{event}/folders', [EventFolderController::class, 'index'])->name('event-folders.index');
        Route::get('events/{event}/folder/create', [EventFolderController::class, 'create'])->name('event-folders.create');  // Renamed route
        Route::post('events/{event}/folders', [EventFolderController::class, 'store'])->name('event-folders.store');
        Route::get('events/{event}/folders/{folder}/edit', [EventFolderController::class, 'edit'])->name('event-folders.edit');
        Route::put('events/{event}/folders/{folder}', [EventFolderController::class, 'update'])->name('event-folders.update');
        Route::delete('events/{event}/folders/{folder}', [EventFolderController::class, 'destroy'])->name('event-folders.destroy');
        Route::delete('events/{event}/folders/{folder}/images/{image}', [EventFolderImageController::class, 'destroy'])->name('event-folder-images.destroy');


        //visionnaires
        Route::resource('visionnaires', VisionnaireController::class)->except(['show']);
        Route::resource('visionnairedetails', VisionnaireDetailController::class)->except(['show']);
        Route::delete('/image/delete/{id}', [ImageController::class, 'delete'])->name('image.delete');


    });
});


