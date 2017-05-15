<?php

namespace App\Providers;

use App\Arduino\Connection\ConnectionManager;
use app\Arduino\Connection\Drivers\Shit\ShitDriverResolver;
use Illuminate\Support\ServiceProvider;

class ArduinoServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = true;

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
        $this->app->singleton(ConnectionManager::class);
        $this->app->afterResolving(ConnectionManager::class, function(ConnectionManager $manager) {
            /*
             * Add drivers here
             */

            $manager->getConfig()->extend('serial-shit', new ShitDriverResolver);
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [
            ConnectionManager::class
        ];
    }
}
