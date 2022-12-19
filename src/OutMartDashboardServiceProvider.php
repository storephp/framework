<?php

namespace Bidaea\OutMart\Dashboard;

use Bidaea\OutMart\Dashboard\Http\Livewire\Catalog\Categories\CategoriesIndex;
use Bidaea\OutMart\Dashboard\Http\Livewire\Catalog\Categories\CategoryCreate;
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
        
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'outmart');
    }
}
