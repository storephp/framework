<?php

namespace Store\Modules\System\Providers;

use StorePHP\Dashboard\Support\ServiceProvider;

class StoreSystemServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        config([
            'store.system.configurations' => array_merge([
                'tabs' => [],
            ], config('store.system.configurations', [])),
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
        ], 'store_system');
    }
}
