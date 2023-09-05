<?php

namespace Store\Modules\StorePHP\Dashboard\Providers;

use Illuminate\Support\ServiceProvider;

class StorePHPDashboardServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'storephp-dashboard');
    }
}
