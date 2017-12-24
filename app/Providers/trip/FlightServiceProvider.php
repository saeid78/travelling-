<?php

namespace App\Providers\trip;

use App\Services\FlightService;
use Illuminate\Support\ServiceProvider;

class FlightServiceProvider extends ServiceProvider
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
        $this->app->bind( FlightService::class, function($app){
            return new FlightService();
        });
    }
}
