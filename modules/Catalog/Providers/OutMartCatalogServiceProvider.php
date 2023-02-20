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
        $this->bootModuleAPP(__DIR__ . '/..', [
            'icon' => 'clipboard-list',
            'name' => 'OutMartCatalog::menu.catalog',
            'slug' => 'catalog'
        ], 'outmart_catalog', [
            $this->addLink(
                icon: 'category',
                name: 'OutMartCatalog::menu.categories',
                route: 'outmart.dashboard.catalog.categories.index',
                order: 10,
            ),
            $this->addLink(
                icon: 'packages',
                name: 'Products',
                route: 'outmart.dashboard.catalog.categories.index',
                order: 20,
            ),
        ]);

        Livewire::component('catalog-categories-index', CategoriesIndex::class);
        Livewire::component('catalog-categories-create', CategoryCreate::class);
        Livewire::component('catalog-categories-edit', CategoryEdit::class);

        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'OutMartCatalog');
    }
}
