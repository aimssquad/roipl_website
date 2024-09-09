<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    // Route::get('/show/{id}', 'show')->name('show');
    // Route::post('/store', 'store')->name('store');
    // Route::put('/update/{id}', 'update')->name('update');
    // Route::delete('/delete/{id}', 'delete')->name('delete');
    Route::get('/contactus', 'contact')->name('contact');
    Route::get('/visionnaire', 'visionnaire')->name('visionnaire');
    Route::get('/about', 'about')->name('about');
    Route::get('/brands', 'brands')->name('brands');
    Route::get('/events', 'events')->name('events');
    Route::get('/gallery', 'gallery')->name('gallery');
    Route::get('/gallery-details', 'galleryDetails')->name('gallery-details');
    Route::get('/event-details', 'eventDetails')->name('event-details');
});

require __DIR__.'/admin.php';
