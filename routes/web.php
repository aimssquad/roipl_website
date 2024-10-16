<?php

use App\Http\Controllers\CareerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BrandController;


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/visionnaire', 'visionnaire')->name('visionnaire');
    Route::get('/our story', 'about')->name('about');
    Route::get('/teams', 'teams')->name('teams');
    Route::get('/gallery', 'gallery')->name('gallery');
    Route::get('/gallery-details', 'galleryDetails')->name('gallery-details');
});
Route::controller(BrandController::class)->group(function () {
    Route::get('/brands', 'brands')->name('brands');
    Route::get('/brand-details/{id}', 'brandDetails')->name('brand-details');
});

Route::controller(LorController::class)->group(function () {
    Route::get('/life of ROIPL', 'events')->name('events');
    Route::get('/event-details/{id}', 'eventDetails')->name('event-details');
});

Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contactus', 'savecontact')->name('contact-save');
});
Route::get('/get-cities', [LocationController::class, 'getCities'])->name('get.cities');
Route::resource('careers', CareerController::class);

Route::get('/refresh-captcha', function() {
    return response()->json(['captcha' => captcha_src('math')]);
});
require __DIR__.'/admin.php';
