<?php

namespace OutMart\Modules\Catalog\Providers;

use Livewire\Livewire;
use OutMart\Dashboard\Support\ServiceProvider;
use OutMart\Modules\Catalog\Http\Livewire\Categories\CategoriesIndex;
use OutMart\Modules\Catalog\Http\Livewire\Categories\CategoryCreate;
use OutMart\Modules\Catalog\Http\Livewire\Categories\CategoryEdit;

class OutMartCatalogServiceProvider extends ServiceProvider
{
    protected $moduleName = 'NAme';

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootModuleAPP(__DIR__ . '/../', [
            'icon' => 'clipboard-list',
            'name' => 'Catalog',
        ], 'outmart_catalog', [
            [
                'icon' => 'puzzle',
                'name' => 'Categories',
                'route' => 'outmart.dashboard.catalog.categories.index',
            ],
        ]);

        Livewire::component('catalog-categories-index', CategoriesIndex::class);
        Livewire::component('catalog-categories-create', CategoryCreate::class);
        Livewire::component('catalog-categories-edit', CategoryEdit::class);

        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'OutMartCatalog');
    }
}
