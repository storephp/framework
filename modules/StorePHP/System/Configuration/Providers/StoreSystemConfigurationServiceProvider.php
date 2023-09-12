<?php

namespace StorePHP\System\Configuration\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use StorePHP\System\Configuration\Http\Livewire\Configurations;

class StoreSystemConfigurationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // 
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Livewire::component('store-system-configuration', Configurations::class);

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'storephp-system-configuration');
    }
}
