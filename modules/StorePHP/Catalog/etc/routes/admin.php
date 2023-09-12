<?php

use Illuminate\Support\Facades\Route;
use StorePHP\Catalog\Http\Livewire\Categories\CategoriesIndex;
use StorePHP\Catalog\Http\Livewire\Categories\CategoryCreate;
use StorePHP\Catalog\Http\Livewire\Categories\CategoryUpdate;
use StorePHP\Catalog\Http\Livewire\Products\ProductCreate;
use StorePHP\Catalog\Http\Livewire\Products\ProductsIndex;
use StorePHP\Catalog\Http\Livewire\Products\ProductUpdate;

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


    Route::prefix('products')->group(function () {
        Route::get('/', ProductsIndex::class)->name('store.dashboard.catalog.products.index');
        Route::get('/create', ProductCreate::class)->name('store.dashboard.catalog.products.create');
        Route::get('/{product}/update', ProductUpdate::class)->name('store.dashboard.catalog.products.update');
    });
});
