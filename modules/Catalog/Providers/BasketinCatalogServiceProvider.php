<?php

namespace Basketin\Modules\Catalog\Providers;

use Livewire\Livewire;
use Basketin\Dashboard\Support\ServiceProvider;
use Basketin\Modules\Catalog\Http\Livewire\Categories\CategoriesIndex;
use Basketin\Modules\Catalog\Http\Livewire\Categories\CategoryCreate;
use Basketin\Modules\Catalog\Http\Livewire\Categories\CategoryEdit;
use Basketin\Modules\Catalog\Http\Livewire\Products\ProductCreate;
use Basketin\Modules\Catalog\Http\Livewire\Products\ProductEdit;
use Basketin\Modules\Catalog\Http\Livewire\Products\ProductsIndex;

class BasketinCatalogServiceProvider extends ServiceProvider
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
            'name' => 'BasketinCatalog::menu.catalog',
            'slug' => 'catalog'
        ], 'basketin_catalog', [
            $this->addLink(
                icon: 'category',
                name: 'BasketinCatalog::menu.categories',
                route: 'basketin.dashboard.catalog.categories.index',
                order: 10,
            ),
            $this->addLink(
                icon: 'packages',
                name: 'Products',
                route: 'basketin.dashboard.catalog.products.index',
                order: 20,
            ),
        ]);

        Livewire::component('catalog-categories-index', CategoriesIndex::class);
        Livewire::component('catalog-categories-create', CategoryCreate::class);
        Livewire::component('catalog-categories-edit', CategoryEdit::class);

        Livewire::component('catalog-products-index', ProductsIndex::class);
        Livewire::component('catalog-products-create', ProductCreate::class);
        Livewire::component('catalog-products-edit', ProductEdit::class);

        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'BasketinCatalog');
    }
}
