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
use StorePHP\Bundler\Facades\Bundles;
use StorePHP\Dashboard\Console\CreateNewAdmin;
use StorePHP\Dashboard\Http\Livewire\Account\LoginPage;
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

        BundlesDirectory::setDirectoryPath(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'modules');
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

        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'store');

        $this->loadViewComponentsAs('store', $this->viewComponents());

        $this->registerProvoiders();

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

    protected function registerProvoiders()
    {
        try {
            foreach (Bundles::getProvoiders() as $provider) {
                $this->app->register($provider);
            }
        } catch (\Throwable $th) {
            if (!$this->app->runningInConsole()) {
                throw $th;
            }
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
