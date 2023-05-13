<?php

use Store\Dashboard\Http\Livewire\Account\LoginPage;
use Store\Dashboard\Http\Livewire\Admin\Home as AdminHome;
use Store\Dashboard\Http\Livewire\Admin\Permissions\Admins\AdminCreate;
use Store\Dashboard\Http\Livewire\Admin\Permissions\Admins\AdminsIndex;
use Store\Dashboard\Http\Livewire\Admin\Permissions\Admins\AdminUpdate;
use Store\Dashboard\Http\Livewire\Home;
use Store\Dashboard\Http\Middleware\GlobalConfigMiddleware;
use Illuminate\Support\Facades\Route;

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

Route::prefix('storephp')->middleware(['web', GlobalConfigMiddleware::class])->group(function () {
    Route::get('/login', LoginPage::class)->name('store.admin.login');
    Route::middleware(['martTeam'])->group(function () {
        Route::get('/', Home::class)->name('store.dashboard.home');

        Route::prefix('admin-area')->group(function () {
            Route::get('/', AdminHome::class)->name('store.dashboard.admin-area.home');

            Route::prefix('permissions')->group(function () {
                Route::prefix('admins')->group(function () {
                    Route::get('/', AdminsIndex::class)->name('store.dashboard.admin-area.permissions.admins');
                    Route::get('/create', AdminCreate::class)->name('store.dashboard.admin-area.permissions.admins.create');
                    Route::get('/update/{admin}', AdminUpdate::class)->name('store.dashboard.admin-area.permissions.admins.update');
                });
            });
        });
    });
});
