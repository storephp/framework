<?php

namespace Store\Modules\StorePHP\Catalog\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Store\Modules\StorePHP\Catalog\Http\Livewire\Categories\CategoriesIndex;
use Store\Modules\StorePHP\Catalog\Http\Livewire\Categories\CategoryCreate;
use Store\Modules\StorePHP\Catalog\Http\Livewire\Categories\CategoryUpdate;
use Store\Modules\StorePHP\Catalog\Http\Livewire\Products\ProductCreate;
use Store\Modules\StorePHP\Catalog\Http\Livewire\Products\ProductUpdate;

class StoreCatalogServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Livewire::component('catalog-categories-index', CategoriesIndex::class);
        Livewire::component('catalog-categories-create', CategoryCreate::class);
        Livewire::component('catalog-categories-update', CategoryUpdate::class);

        Livewire::component('catalog-products-create', ProductCreate::class);
        Livewire::component('catalog-products-update', ProductUpdate::class);
    }
}
