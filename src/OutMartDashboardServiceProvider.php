<?php

namespace OutMart\Dashboard;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use OutMart\Dashboard\Http\Livewire\Catalog\Categories\CategoriesIndex;
use OutMart\Dashboard\Http\Livewire\Catalog\Categories\CategoryCreate;
use OutMart\Dashboard\Http\Livewire\Catalog\Categories\CategoryEdit;
use OutMart\Dashboard\Views\Form\InputFile;
use OutMart\Dashboard\Views\Form\InputPrice;
use OutMart\Dashboard\Views\Form\InputText;
use OutMart\Dashboard\Views\Form\Select;
use OutMart\Dashboard\Views\Layouts\DashboardLayout;

class OutMartDashboardServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/core.php', 'outmart.dashboard.core');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('outmart-dashboard-layout', DashboardLayout::class);

        Livewire::component('catalog-categories-index', CategoriesIndex::class);
        Livewire::component('catalog-categories-create', CategoryCreate::class);
        Livewire::component('catalog-categories-edit', CategoryEdit::class);

        // $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'outmart');

        $this->loadViewComponentsAs('outmart', $this->viewComponents());
    }

    private function viewComponents(): array
    {
        return [
            InputText::class,
            InputPrice::class,
            InputFile::class,
            Select::class,
        ];
    }
}
