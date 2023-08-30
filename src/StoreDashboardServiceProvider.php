<?php

namespace StorePHP\Dashboard;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Store\Support\Traits\HasSetupStore;
use StorePHP\Bundler\BundlesDirectory;
use StorePHP\Dashboard\Console\CreateNewAdmin;
use StorePHP\Dashboard\Http\Livewire\Account\LoginPage;
use StorePHP\Dashboard\Http\Livewire\Admin\Permissions\Admins\AdminCreate;
use StorePHP\Dashboard\Http\Livewire\Admin\Permissions\Admins\AdminUpdate;
use StorePHP\Dashboard\Http\Livewire\Catalog\Categories\CategoriesIndex;
use StorePHP\Dashboard\Http\Livewire\Catalog\Categories\CategoryCreate;
use StorePHP\Dashboard\Http\Livewire\Catalog\Categories\CategoryEdit;
use StorePHP\Dashboard\Http\Livewire\System\Updates;
use StorePHP\Dashboard\Http\Middleware\StoreAuthenticated;
use StorePHP\Dashboard\Views\Components\Widgets\WidgetEmptyData;
use StorePHP\Dashboard\Views\Form\InputDate;
use StorePHP\Dashboard\Views\Form\InputFile;
use StorePHP\Dashboard\Views\Form\InputPrice;
use StorePHP\Dashboard\Views\Form\InputText;
use StorePHP\Dashboard\Views\Form\InputTextarea;
use StorePHP\Dashboard\Views\Form\Select;
use StorePHP\Dashboard\Views\Layouts\DashboardLayout;

class StoreDashboardServiceProvider extends ServiceProvider
{
    use HasSetupStore;

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        config([
            'auth.guards.store' => array_merge([
                'driver' => 'session',
                'provider' => 'store',
            ], config('auth.guards.store', [])),
        ]);

        config([
            'auth.providers.store' => array_merge([
                'driver' => 'eloquent',
                'model' => \StorePHP\Dashboard\Models\Admin::class,
            ], config('auth.providers.store', [])),
        ]);

        $this->mergeConfigFrom(__DIR__ . '/../config/dashboard.php', 'store.dashboard');

        BundlesDirectory::setDirectoryPath(__DIR__ . './../modules');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        View::composer('*', function ($view) {
            if ($user = Auth::guard('store')->user()) {
                $view->with('member', $user);
            }
        });

        $router->aliasMiddleware('martTeam', StoreAuthenticated::class);

        Blade::component('store-dashboard-layout', DashboardLayout::class);

        Livewire::component('store-system-updates', Updates::class);

        Livewire::component('store-account-login', LoginPage::class);

        Livewire::component('catalog-categories-index', CategoriesIndex::class);
        Livewire::component('catalog-categories-create', CategoryCreate::class);
        Livewire::component('catalog-categories-edit', CategoryEdit::class);

        Livewire::component('admin-permissions-admins-create', AdminCreate::class);
        Livewire::component('admin-permissions-admins-update', AdminUpdate::class);

        // $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'store');

        $this->loadViewComponentsAs('store', $this->viewComponents());

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../public/assets' => public_path('vendor/storephp'),
            ], 'storephp');

            $this->appendCommandToSetup(CreateNewAdmin::class);

            $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

            $this->commands([
                CreateNewAdmin::class,
            ]);
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
