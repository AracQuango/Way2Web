<?php

namespace Way2Web\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapModularRoutes();
    }

    /**
     * Define the routes for all Modules in the application.
     * This happens by looping through the /Modules/ folder
     * and scanning through all the routes subdirectories per module.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapModularRoutes()
    {

        foreach (glob(base_path('App/Modules') . "/*/Routes/*.php") as $routefile) {
            Route::middleware("api")->group($routefile);
        }
    }

}
