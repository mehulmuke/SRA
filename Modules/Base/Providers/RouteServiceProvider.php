<?php

namespace Modules\Base\Providers;

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

 class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define the routes for the application.
     *
     * @return void
     */
    
    public function map()
    {
        Route::group([
            'namespace' => $this->namespace,
            'prefix' => LaravelLocalization::setLocale(),
            'middleware' => ['localize', 'locale_session_redirect', 'localization_redirect', 'web'],
        ], function () {
            $this->mapAdminRoutes();
            $this->mapPublicRoutes();
        });
    }

    private function mapAdminRoutes()
    {
        if (! method_exists($this, 'admin')) {
            return;
        }

        Route::group([
            'namespace' => 'Admin',
            'prefix' => '',
            'middleware' => ['admin'],
        ], function () {
            require $this->admin();
        });
    }
    private function mapPublicRoutes()
    {
       
        if (method_exists($this, 'public')) {
            require $this->public();
        }
    }

}
