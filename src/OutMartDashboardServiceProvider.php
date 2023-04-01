<?php

namespace OutMart\Dashboard;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use OutMart\Dashboard\Http\Livewire\Account\LoginPage;
use OutMart\Dashboard\Http\Livewire\Catalog\Categories\CategoriesIndex;
use OutMart\Dashboard\Http\Livewire\Catalog\Categories\CategoryCreate;
use OutMart\Dashboard\Http\Livewire\Catalog\Categories\CategoryEdit;
use OutMart\Dashboard\Http\Middleware\OutMartAuthenticated;
use OutMart\Dashboard\Views\Components\Widgets\WidgetEmptyData;
use OutMart\Dashboard\Views\Form\InputDate;
use OutMart\Dashboard\Views\Form\InputFile;
use OutMart\Dashboard\Views\Form\InputPrice;
use OutMart\Dashboard\Views\Form\InputText;
use OutMart\Dashboard\Views\Form\InputTextarea;
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
        config([
            'auth.guards.outmart' => array_merge([
                'driver' => 'session',
                'provider' => 'outmart',
            ], config('auth.guards.outmart', [])),
        ]);

        config([
            'auth.providers.outmart' => array_merge([
                'driver' => 'eloquent',
                'model' => \OutMart\Dashboard\Models\Admin::class,
            ], config('auth.providers.outmart', [])),
        ]);

        $this->mergeConfigFrom(__DIR__ . '/../config/core.php', 'outmart.dashboard.core');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        View::composer('*', function ($view) {
            if ($user = Auth::guard('outmart')->user()) {
                $view->with('member', $user);
            }
        });

        $router->aliasMiddleware('martTeam', OutMartAuthenticated::class);

        Blade::component('outmart-dashboard-layout', DashboardLayout::class);

        Livewire::component('outmart-account-login', LoginPage::class);

        Livewire::component('catalog-categories-index', CategoriesIndex::class);
        Livewire::component('catalog-categories-create', CategoryCreate::class);
        Livewire::component('catalog-categories-edit', CategoryEdit::class);

        // $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'outmart');

        $this->loadViewComponentsAs('outmart', $this->viewComponents());

        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        }
    }

    private function viewComponents(): array
    {
        return [
            InputText::class,
            InputTextarea::class,
            InputPrice::class,
            InputFile::class,
            InputDate::class,
            Select::class,
            WidgetEmptyData::class,
        ];
    }
}
