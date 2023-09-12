<?php

use Illuminate\Support\Facades\Route;
use StorePHP\Dashboard\Http\Livewire\Account\LoginPage;
use StorePHP\Dashboard\Http\Livewire\Admin\Home as AdminHome;
use StorePHP\Dashboard\Http\Middleware\GlobalConfigMiddleware;
use StorePHP\Bundler\Facades\Bundles;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

$prefix = $prefix ?? config('store.dashboard.routes.prefix', 'storephp');

Route::middleware(config('store.dashboard.routes.middlewares', []))->group(function () use ($prefix) {
    Route::prefix($prefix)->middleware(['web', GlobalConfigMiddleware::class])->group(function () {
        Route::get('/login', LoginPage::class)->name('store.admin.login');
        Route::middleware(['martTeam'])->group(function () {
            Route::prefix('admin-area')->group(function () {
                Route::get('/', AdminHome::class)->name('store.dashboard.admin-area.home');

                try {
                    foreach (Bundles::getAdminRoutes() as $routePath) {
                        Route::middleware(array_merge(config('store.dashboard.routes.middlewares', []), ['martTeam']))
                            ->group($routePath);
                    }
                } catch (\Throwable $th) {
                    if (!app()->runningInConsole()) {
                        throw $th;
                    }
                }
            });
        });

        try {
            foreach (Bundles::getRoutes() as $routePath) {
                Route::middleware(array_merge(config('store.dashboard.routes.middlewares', []), ['martTeam']))
                    ->group($routePath);
            }
        } catch (\Throwable $th) {
            if (!app()->runningInConsole()) {
                throw $th;
            }
        }
    });
});
