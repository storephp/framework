<?php

namespace OutMart\Dashboard\Support;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;
use Illuminate\Support\Str;
use OutMart\Dashboard\Http\Middleware\GlobalConfigMiddleware;

abstract class ServiceProvider extends IlluminateServiceProvider
{
    private $moduleDir = null;
    private $moduleData = null;

    protected function bootModuleAPP($moduleDir, $moduleData, $moduleMenuId = null, $moduleMenu = null)
    {
        $modules = config('outmart.dashboard.core.modules');

        $modules[$moduleMenuId] = [
            'icon' => $moduleData['icon'] ?? 'puzzle',
            'name' => $moduleData['name'] ?? 'Module',
            'slug' => $moduleData['slug'] ?? 'sodule',
            'order' => $moduleData['order'] ?? null,
            'description' => $moduleData['description'] ?? [],
            'rule' => $moduleData['rule'] ?? '*',
            'menu' => $moduleMenu ?? [],
        ];

        $modules = array_map(function ($module) {

            $moduleMenu = array_map(function ($menu) {
                $menu['order'] = $menu['order'] ?? 1000;
                return $menu;
            }, $module['menu']);

            $module['menu'] = collect($moduleMenu)->sortBy('order')->all();

            $module['menu'] = array_map(function ($menu) {
                if (isset($menu['submenu'])) {
                    $menu['submenu'] = collect($menu['submenu'])->sortBy('order')->all();
                }
                return $menu;
            }, $module['menu']);

            return $module;
        }, $modules);

        config(['outmart.dashboard.core.modules' => $modules]);

        $this->moduleDir = $moduleDir;
        $this->moduleData = $modules[$moduleMenuId];

        $this->loadRoutes($moduleDir);
        $this->loadAppViews($moduleDir, $moduleData['slug']);
        $this->loadAppTranslations();

        // dd(config('outmart.dashboard.core.modules.' . $moduleMenuId . '.menu'));

        // array_push(config('outmart.dashboard.core.modules.' . $moduleMenuId . '.menu'), []);
    }

    // $this->appendToMenu('outmart_catalog', [
    //     'icon' => 'user',
    //     'name' => 'User',
    //     'route' => 'route',
    // ]);
    protected function appendToMenu($moduleMenuId, $addMenu)
    {
        $menu = config('outmart.dashboard.core.modules.' . $moduleMenuId . '.menu');

        // dd(gettype($addMenu), $addMenu);

        $menu = array_merge($menu, $addMenu);

        config(['outmart.dashboard.core.modules.' . $moduleMenuId . '.menu' => $menu]);
    }

    // $this->addLink(
    //     icon: 'category',
    //     name: 'OutMartCatalog::menu.categories',
    //     route: 'outmart.dashboard.catalog.categories.index',
    //     order: 100,
    // ),
    // $this->addLink(
    //     name: 'slub',
    //     submenu: [
    //         $this->addLink(
    //             icon: 'category',
    //             name: 'OutMartCatalog::menu.categories',
    //             route: 'outmart.dashboard.catalog.categories.index',
    //             order: 2,
    //         ),
    //         $this->addLink(
    //             icon: 'category',
    //             name: '123546',
    //             route: 'outmart.dashboard.catalog.categories.index',
    //             order: 1,
    //         ),
    //     ],
    // ),
    protected function addLink($icon = 'link', $name = '', $route = null, $submenu = null, $order = null)
    {
        $data = [
            'icon' => $icon,
            'name' => $name,
        ];

        if ($route && !$submenu) {
            $data['route'] = $route;
        }

        if ($submenu && !$route) {
            $data['submenu'] = $submenu;
        }

        if ($order) {
            $data['order'] = $order;
        }

        return $data;
    }

    protected function loadRoutes($moduleDir, $prefix = null)
    {
        // dd($dir);
        if (file_exists($moduleDir . '/routes/web.php')) {
            $prefix = Str::slug($this->moduleData['slug'] ?? $prefix);
            Route::middleware(['web', 'martTeam', GlobalConfigMiddleware::class])
                ->prefix('outmart/' . $prefix)
                ->group(function () use ($moduleDir) {
                    $this->loadRoutesFrom($moduleDir . '/routes/web.php');
                });
        }
    }

    protected function loadAppViews($moduleDir, $prefix = null)
    {
        if (is_dir($moduleDir . '/resources/views')) {
            $this->loadViewsFrom($moduleDir . '/resources/views', 'outmart' . Str::ucfirst($prefix));
        }
    }

    private function loadAppTranslations()
    {
        if (is_dir($this->moduleDir . '/lang')) {
            $this->loadTranslationsFrom($this->moduleDir . '/lang', 'outmart' . Str::ucfirst($this->moduleData['slug']));
        }
    }
}
