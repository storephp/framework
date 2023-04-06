<?php

namespace Basketin\Dashboard\Support;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;
use Illuminate\Support\Str;
use Basketin\Dashboard\Http\Middleware\GlobalConfigMiddleware;

abstract class ServiceProvider extends IlluminateServiceProvider
{
    private $moduleDir = null;
    private $moduleData = null;

    protected function bootModuleAPP($moduleDir, $moduleData, $moduleMenuId = null, $moduleMenu = null)
    {
        $modules = config('basketin.dashboard.core.modules');

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

        config(['basketin.dashboard.core.modules' => $modules]);

        $this->moduleDir = $moduleDir;
        $this->moduleData = $modules[$moduleMenuId];

        $this->loadRoutes($moduleDir);
        $this->loadAppViews($moduleDir, $moduleData['slug']);
        $this->loadAppTranslations();

        // dd(config('basketin.dashboard.core.modules.' . $moduleMenuId . '.menu'));

        // array_push(config('basketin.dashboard.core.modules.' . $moduleMenuId . '.menu'), []);
    }

    // $this->appendToMenu('basketin_catalog', [
    //     'icon' => 'user',
    //     'name' => 'User',
    //     'route' => 'route',
    // ]);
    protected function appendToMenu($moduleMenuId, $addMenu)
    {
        $menu = config('basketin.dashboard.core.modules.' . $moduleMenuId . '.menu');

        // dd(gettype($addMenu), $addMenu);

        $menu = array_merge($menu, $addMenu);

        config(['basketin.dashboard.core.modules.' . $moduleMenuId . '.menu' => $menu]);
    }

    // $this->addLink(
    //     icon: 'category',
    //     name: 'BasketinCatalog::menu.categories',
    //     route: 'basketin.dashboard.catalog.categories.index',
    //     order: 100,
    // ),
    // $this->addLink(
    //     name: 'slub',
    //     submenu: [
    //         $this->addLink(
    //             icon: 'category',
    //             name: 'BasketinCatalog::menu.categories',
    //             route: 'basketin.dashboard.catalog.categories.index',
    //             order: 2,
    //         ),
    //         $this->addLink(
    //             icon: 'category',
    //             name: '123546',
    //             route: 'basketin.dashboard.catalog.categories.index',
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

    protected function configurationCreateTab($tabKey, $tabName)
    {
        config([
            'basketin.system.configurations.tabs' => array_merge([
                $tabKey => [
                    'name' => $tabName,
                    'sub_tabs' => [],
                ],
            ], config('basketin.system.configurations.tabs')),
        ]);
    }

    protected function configurationCreateSubTab($tabKey, $subTabKey, $subTabName, $fields = [])
    {
        config([
            'basketin.system.configurations.tabs.' . $tabKey . '.sub_tabs' => array_merge([
                $subTabKey => [
                    'name' => $subTabName,
                    'fields' => $fields,
                ],
            ], config('basketin.system.configurations.tabs.' . $tabKey . '.sub_tabs')),
        ]);
    }

    protected function configurationAddField($type = 'string', $label, $path)
    {
        $data = [
            'type' => $type,
            'label' => $label,
            'path' => $path,
        ];

        return $data;
    }

    protected function loadRoutes($moduleDir, $prefix = null)
    {
        // dd($dir);
        if (file_exists($moduleDir . '/routes/web.php')) {
            $prefix = Str::slug($this->moduleData['slug'] ?? $prefix);
            Route::middleware(['web', 'martTeam', GlobalConfigMiddleware::class])
                ->prefix('basketin/' . $prefix)
                ->group(function () use ($moduleDir) {
                    $this->loadRoutesFrom($moduleDir . '/routes/web.php');
                });
        }
    }

    protected function loadAppViews($moduleDir, $prefix = null)
    {
        if (is_dir($moduleDir . '/resources/views')) {
            $this->loadViewsFrom($moduleDir . '/resources/views', 'basketin' . Str::ucfirst($prefix));
        }
    }

    private function loadAppTranslations()
    {
        if (is_dir($this->moduleDir . '/lang')) {
            $this->loadTranslationsFrom($this->moduleDir . '/lang', 'basketin' . Str::ucfirst($this->moduleData['slug']));
        }
    }
}
