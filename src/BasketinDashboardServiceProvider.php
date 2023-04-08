<?php

namespace Basketin\Dashboard;

use Basketin\Dashboard\Http\Livewire\Account\LoginPage;
use Basketin\Dashboard\Http\Livewire\Catalog\Categories\CategoriesIndex;
use Basketin\Dashboard\Http\Livewire\Catalog\Categories\CategoryCreate;
use Basketin\Dashboard\Http\Livewire\Catalog\Categories\CategoryEdit;
use Basketin\Dashboard\Http\Livewire\System\Updates;
use Basketin\Dashboard\Http\Middleware\BasketinAuthenticated;
use Basketin\Dashboard\Views\Components\Widgets\WidgetEmptyData;
use Basketin\Dashboard\Views\Form\InputDate;
use Basketin\Dashboard\Views\Form\InputFile;
use Basketin\Dashboard\Views\Form\InputPrice;
use Basketin\Dashboard\Views\Form\InputText;
use Basketin\Dashboard\Views\Form\InputTextarea;
use Basketin\Dashboard\Views\Form\Select;
use Basketin\Dashboard\Views\Layouts\DashboardLayout;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class BasketinDashboardServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        config([
            'auth.guards.basketin' => array_merge([
                'driver' => 'session',
                'provider' => 'basketin',
            ], config('auth.guards.basketin', [])),
        ]);

        config([
            'auth.providers.basketin' => array_merge([
                'driver' => 'eloquent',
                'model' => \Basketin\Dashboard\Models\Admin::class,
            ], config('auth.providers.basketin', [])),
        ]);

        $this->mergeConfigFrom(__DIR__ . '/../config/dashboard.php', 'basketin.dashboard');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        View::composer('*', function ($view) {
            if ($user = Auth::guard('basketin')->user()) {
                $view->with('member', $user);
            }
        });

        $router->aliasMiddleware('martTeam', BasketinAuthenticated::class);

        Blade::component('basketin-dashboard-layout', DashboardLayout::class);

        Livewire::component('basketin-system-updates', Updates::class);

        Livewire::component('basketin-account-login', LoginPage::class);

        Livewire::component('catalog-categories-index', CategoriesIndex::class);
        Livewire::component('catalog-categories-create', CategoryCreate::class);
        Livewire::component('catalog-categories-edit', CategoryEdit::class);

        // $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'basketin');

        $this->loadViewComponentsAs('basketin', $this->viewComponents());

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
