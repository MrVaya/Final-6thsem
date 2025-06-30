<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AdminDashboardController;

// Frontend Routes
Route::get('/', [FrontendController::class, 'index'])->name('frontend.home');

// Public booking route (for "Book Now" functionality)
Route::post('/book-now', [BookingController::class, 'storeFromFrontend'])->name('frontend.booking.store');

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
    Route::resource('categories', 'App\Http\Controllers\CategoryController');
    Route::resource('bookings', 'App\Http\Controllers\BookingController');
    Route::resource('hero-sections', 'App\Http\Controllers\HeroSectionController');
    
    // Additional booking routes
    Route::patch('bookings/{booking}/status', [BookingController::class, 'updateStatus'])->name('bookings.status');
});

// Legacy routes for backwards compatibility
Route::resource('venue', 'App\Http\Controllers\VenueController');
Route::resource('products', 'App\Http\Controllers\ProductController');