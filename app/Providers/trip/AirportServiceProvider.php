<?php

namespace App\Providers\trip;

use App\Services\AirportService;
use Illuminate\Support\ServiceProvider;

class AirportServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AirportService::class, function($app){
            return new AirportService();
        });
    }
}
