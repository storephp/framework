<?php

namespace OutMart\Modules\Catalog\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use OutMart\Modules\Catalog\Http\Livewire\Categories\CategoriesIndex;
use OutMart\Modules\Catalog\Http\Livewire\Categories\CategoryCreate;
use OutMart\Modules\Catalog\Http\Livewire\Categories\CategoryEdit;

class OutMartCatalogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Livewire::component('catalog-categories-index', CategoriesIndex::class);
        Livewire::component('catalog-categories-create', CategoryCreate::class);
        Livewire::component('catalog-categories-edit', CategoryEdit::class);

        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'OutMartCatalog');

        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }
}
