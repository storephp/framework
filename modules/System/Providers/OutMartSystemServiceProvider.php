<?php

namespace OutMart\Modules\System\Providers;

use OutMart\Dashboard\Support\ServiceProvider;

class OutMartSystemServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        config([
            'outmart.system.configurations' => array_merge([
                'tabs' => [],
            ], config('outmart.system.configurations', [])),
        ]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootModuleAPP(__DIR__ . '/..', [
            'icon' => 'settings-2',
            'name' => 'System',
            'slug' => 'system',
            'order' => 1000,
        ], 'outmart_system');
    }
}
