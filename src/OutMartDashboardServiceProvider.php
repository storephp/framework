<?php

namespace OutMart\Dashboard;

use OutMart\Dashboard\Http\Livewire\Catalog\Categories\CategoriesIndex;
use OutMart\Dashboard\Http\Livewire\Catalog\Categories\CategoryCreate;
use OutMart\Dashboard\Http\Livewire\Catalog\Categories\CategoryEdit;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class OutMartDashboardServiceProvider extends ServiceProvider
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
        Livewire::component('catalog-categories-edit', CategoryEdit::class);

        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'outmart');
    }
}
