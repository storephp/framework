<?php

namespace Store\Modules\Catalog\Providers;

use Livewire\Livewire;
use Store\Dashboard\Support\ServiceProvider;
use Store\Modules\Catalog\Http\Livewire\Categories\CategoriesIndex;
use Store\Modules\Catalog\Http\Livewire\Categories\CategoryCreate;
use Store\Modules\Catalog\Http\Livewire\Categories\CategoryEdit;
use Store\Modules\Catalog\Http\Livewire\Products\ProductCreate;
use Store\Modules\Catalog\Http\Livewire\Products\ProductEdit;
use Store\Modules\Catalog\Http\Livewire\Products\ProductsIndex;
use Store\Modules\Catalog\Libs\Builder\AddFieldToCategory;
use Store\Modules\Catalog\Libs\Builder\AddFieldToProduct;
use Store\Modules\Catalog\Libs\Builder\AddTabToCategory;
use Store\Modules\Catalog\Libs\Builder\AddTabToProduct;

class StoreCatalogServiceProvider extends ServiceProvider
{
    protected $moduleName = 'NAme';

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('addTabToCategory', function () {
            return new AddTabToCategory();
        });

        $this->app->singleton('addTabToProduct', function () {
            return new AddTabToProduct();
        });

        $this->app->singleton('addFieldToCategory', function () {
            return new AddFieldToCategory();
        });

        $this->app->singleton('addFieldToProduct', function () {
            return new AddFieldToProduct();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootModuleAPP(__DIR__ . '/..', [
            'icon' => 'clipboard-list',
            'name' => 'StoreCatalog::menu.catalog',
            'slug' => 'catalog'
        ], 'store_catalog', [
            $this->addLink(
                icon: 'category',
                name: 'StoreCatalog::menu.categories',
                route: 'store.dashboard.catalog.categories.index',
                order: 10,
            ),
            $this->addLink(
                icon: 'packages',
                name: 'Products',
                route: 'store.dashboard.catalog.products.index',
                order: 20,
            ),
        ]);

        Livewire::component('catalog-categories-index', CategoriesIndex::class);
        Livewire::component('catalog-categories-create', CategoryCreate::class);
        Livewire::component('catalog-categories-edit', CategoryEdit::class);

        Livewire::component('catalog-products-index', ProductsIndex::class);
        Livewire::component('catalog-products-create', ProductCreate::class);
        Livewire::component('catalog-products-edit', ProductEdit::class);

        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'StoreCatalog');
    }
}
