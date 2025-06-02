<?php

use App\Http\Controllers\CareerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LorController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\VisionnaireController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\AnnouncementController;

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/our story', 'about')->name('about');
    Route::get('/teams', 'teams')->name('teams');
    Route::get('/gallery', 'gallery')->name('gallery');
    Route::get('/gallery-details/{event}/folders', 'galleryDetails')->name('gallery-details');

});
Route::controller(BrandController::class)->group(function () {
    Route::get('/brands', 'brands')->name('brands');
    Route::get('/brand-details/{id}', 'brandDetails')->name('brand-details');
});

Route::controller(AnnouncementController::class)->group(function () {
    Route::get('/announcements', 'index')->name('announcements');
    Route::get('/announcement-details/{id}-{slug}', 'details')->name('announcement-details');
});
Route::controller(PageController::class)->group(function () {
    Route::get('/page', 'index')->name('page');
    Route::get('/page-details/{slug}', 'details')->name('page-details');
});


Route::controller(VisionnaireController::class)->group(function () {
    Route::get('/visionnaire', 'visionnaire')->name('visionnaire');
    Route::get('/visionnaire-details/{id}', 'visionnaireDetail')->name('visionnaire-details');
});

Route::controller(LorController::class)->group(function () {
    Route::get('/life of ROIPL', 'events')->name('events');
    Route::get('/events/{event}/folders', 'eventDetails')->name('event-details');
    Route::get('/events/{event}/folders/{folder}/details', 'detailsImage')->name('event-image.details');
});

Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contactus', 'savecontact')->name('contact-save');
});
Route::get('/get-cities', [LocationController::class, 'getCities'])->name('get.cities');
Route::resource('careers', CareerController::class);
Route::get('/career/apply/{encodedId}', [CareerController::class, 'applyForm'])->name('career.apply');
Route::post('/career/apply/submit', [CareerController::class, 'submitApplication'])->name('career.apply.submit');


Route::get('/refresh-captcha', function() {
    return response()->json(['captcha' => captcha_src('math')]);
});




require __DIR__.'/admin.php';
