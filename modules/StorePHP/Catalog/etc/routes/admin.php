<?php

use Illuminate\Support\Facades\Route;
use Store\Modules\StorePHP\Catalog\Http\Livewire\Categories\CategoriesIndex;
use Store\Modules\StorePHP\Catalog\Http\Livewire\Categories\CategoryCreate;
use Store\Modules\StorePHP\Catalog\Http\Livewire\Categories\CategoryUpdate;

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

Route::prefix('catalog')->group(function () {
    Route::prefix('categories')->group(function () {
        Route::get('/', CategoriesIndex::class)->name('store.dashboard.catalog.categories.index');
        Route::get('/create', CategoryCreate::class)->name('store.dashboard.catalog.categories.create');
        Route::get('/{category}/update', CategoryUpdate::class)->name('store.dashboard.catalog.categories.update');
    });
});
