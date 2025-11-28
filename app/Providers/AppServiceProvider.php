<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // <<-- pastikan ini ada 
use Illuminate\Support\Facades\Schema;
use App\Models\Website; // <<-- pastikan ini ada juga

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
     public function boot(): void
    {
        // Bagikan data website ke semua view dan cache()->remember utk simpan cache 1 jam agar website ringan
        View::composer('*', function ($view) {
            $view->with('websiteData', cache()->remember('websiteData', 3600, function () {
                return \App\Models\Website::first();
            }));
        });
    }
}
