<?php

use Illuminate\Support\Facades\Route;
   

Route::get('/', function () {
    return view('frontend.index');
});

    
        Route::get('/admin', function () {
            return view('admin.index');
        });


 route::Resource('venue','App\Http\Controllers\VenueController');

Route::resource('products', 'App\\Http\\Controllers\\ProductController');