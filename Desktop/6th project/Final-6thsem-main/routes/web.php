<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AdminDashboardController;

// Frontend Routes
Route::get('/', [FrontendController::class, 'index'])->name('frontend.home');

// Public Frontend Pages
Route::get('/venues', [FrontendController::class, 'venues'])->name('frontend.venues');
Route::get('/about', [FrontendController::class, 'about'])->name('frontend.about');
Route::get('/contact', [FrontendController::class, 'contact'])->name('frontend.contact');
Route::get('/services', [FrontendController::class, 'services'])->name('frontend.services');
Route::get('/privacy-policy', [FrontendController::class, 'privacy'])->name('frontend.privacy');
Route::get('/terms-conditions', [FrontendController::class, 'terms'])->name('frontend.terms');
Route::get('/gallery', [FrontendController::class, 'gallery'])->name('frontend.gallery');
Route::get('/faq', [FrontendController::class, 'faq'])->name('frontend.faq');

// Public booking route (for "Book Now" functionality)
Route::post('/book-now', [BookingController::class, 'storeFromFrontend'])->name('frontend.booking.store');

// Contact form submission
Route::post('/contact', [FrontendController::class, 'contactSubmit'])->name('frontend.contact.submit');

// Admin Routes
Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

// Admin Resource Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('venues', 'App\Http\Controllers\VenueController')->names([
        'index' => 'venues.index',
        'create' => 'venues.create',
        'store' => 'venues.store',
        'show' => 'venues.show',
        'edit' => 'venues.edit',
        'update' => 'venues.update',
        'destroy' => 'venues.destroy',
    ]);
    
    Route::resource('products', 'App\Http\Controllers\ProductController');
    Route::resource('tournaments', 'App\Http\Controllers\TournamentController');
    Route::resource('bookings', 'App\Http\Controllers\BookingController');
    Route::resource('hero-sections', 'App\Http\Controllers\HeroSectionController');
    
    // Additional booking routes
    Route::patch('bookings/{booking}/status', [BookingController::class, 'updateStatus'])->name('bookings.status');
});

// Legacy routes for backwards compatibility
Route::resource('venue', 'App\Http\Controllers\VenueController');
Route::resource('products', 'App\Http\Controllers\ProductController');
