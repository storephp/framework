<?php

namespace Basketin\Modules\System\Providers;

use Basketin\Dashboard\Support\ServiceProvider;

class BasketinSystemServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        config([
            'basketin.system.configurations' => array_merge([
                'tabs' => [],
            ], config('basketin.system.configurations', [])),
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
        ], 'basketin_system');
    }
}
