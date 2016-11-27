<?php

namespace Watergo\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind(\Watergo\Repositories\LocationRepository::class, \Watergo\Repositories\LocationRepositoryEloquent::class);
        //:end-bindings:
    }
}
