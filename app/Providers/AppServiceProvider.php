<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ImageUploadService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ImageUploadService::class, function ($app) {
            return new ImageUploadService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
