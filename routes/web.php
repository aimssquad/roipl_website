<?php

use App\Http\Controllers\CareerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'index')->name('index');
    Route::get('/visionnaire', 'visionnaire')->name('visionnaire');
    Route::get('/our story', 'about')->name('about');
    Route::get('/brands', 'brands')->name('brands');
    Route::get('/life of ROIPL', 'events')->name('events');
    Route::get('/teams', 'teams')->name('teams');
    Route::get('/gallery', 'gallery')->name('gallery');
    Route::get('/gallery-details', 'galleryDetails')->name('gallery-details');
    Route::get('/event-details', 'eventDetails')->name('event-details');
});

Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contactus', 'savecontact')->name('contact-save');
});
Route::get('/get-cities', [LocationController::class, 'getCities'])->name('get.cities');
Route::resource('careers', CareerController::class);

// for captcha
Route::get('/refresh-captcha', function () {
    return response()->json(['captcha' => captcha_src()]);
});
require __DIR__.'/admin.php';
