<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

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
        Http::macro('theCat', function(){
            return Http::withHeaders([
                'x-api-key' => config('services.cat_api.key'),
            ])->baseUrl(config('services.cat_api.url'));
        });
    }
}
