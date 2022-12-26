<?php

use OutMart\Dashboard\Http\Livewire\Catalog\Categories\CategoriesIndex;
use OutMart\Dashboard\Http\Livewire\Catalog\Categories\CategoryCreate;
use OutMart\Dashboard\Http\Livewire\Catalog\Categories\CategoryEdit;
use OutMart\Dashboard\Http\Livewire\Customers\CustomersIndex;
use OutMart\Dashboard\Http\Livewire\Home;
use OutMart\Dashboard\Http\Middleware\GlobalConfigMiddleware;
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

Route::get('/test', function(){
    throw new Exception('Hi');
});


Route::prefix('outmart')->middleware(['web', GlobalConfigMiddleware::class])->group(function () {
    Route::get('/', Home::class)->name('outmart.dashboard.home');

    // catalog
    Route::prefix('catalog')->group(function () {
        Route::prefix('categories')->group(function () {
            Route::get('/', CategoriesIndex::class)->name('outmart.dashboard.catalog.categories.index');
            Route::get('/create', CategoryCreate::class)->name('outmart.dashboard.catalog.categories.create');
            Route::get('/{category}/edit', CategoryEdit::class)->name('outmart.dashboard.catalog.categories.edit');
        });
    });

    // Customers
    Route::prefix('customers')->group(function () {
        Route::get('/', CustomersIndex::class)->name('outmart.dashboard.customers.index');
    });
});
