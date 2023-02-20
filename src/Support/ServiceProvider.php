<?php

namespace OutMart\Dashboard\Support;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;
use Illuminate\Support\Str;

abstract class ServiceProvider extends IlluminateServiceProvider
{
    private $moduleDir = null;
    private $moduleData = null;

    public function bootModuleAPP($moduleDir, $moduleData, $moduleMenuId = null, $moduleMenu = null)
    {
        $module = config('outmart.dashboard.core.modules');

        $module[$moduleMenuId] = [
            'icon' => $moduleData['icon'] ?? 'puzzle',
            'name' => $moduleData['name'] ?? 'Module',
            'slug' => $moduleData['slug'] ?? 'sodule',
            'description' => $moduleData['description'] ?? [],
            'menu' => $moduleMenu ?? [],
        ];

        config(['outmart.dashboard.core.modules' => $module]);

        $this->moduleDir = $moduleDir;
        $this->moduleData = $module[$moduleMenuId];

        $this->loadRoutes();
        $this->loadAppViews();

        // dd(config('outmart.dashboard.core.modules.' . $moduleMenuId . '.menu'));

        // array_push(config('outmart.dashboard.core.modules.' . $moduleMenuId . '.menu'), []);
    }
    
    private function loadRoutes()
    {
        if (file_exists($this->moduleDir . '/routes/web.php')) {
            $prefix = Str::slug($this->moduleData['slug']);
            Route::middleware(['web'])
                ->prefix('outmart/' . $prefix)
                ->group(function () {
                    $this->loadRoutesFrom($this->moduleDir . '/routes/web.php');
                });
        }
    }

    private function loadAppViews()
    {
        if (is_dir($this->moduleDir . '/resources/views')) {
            $this->loadViewsFrom($this->moduleDir . '/resources/views', 'outmart' . Str::ucfirst($this->moduleData['name']));
        }
    }
}
