<?php

use Illuminate\Support\Facades\Route;
use OutMart\Modules\Catalog\Http\Livewire\Categories\CategoriesIndex;
use OutMart\Modules\Catalog\Http\Livewire\Categories\CategoryCreate;
use OutMart\Modules\Catalog\Http\Livewire\Categories\CategoryEdit;

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

Route::prefix('outmart')->middleware(['web'])->group(function () {
    // catalog
    Route::prefix('catalog')->group(function () {
        Route::prefix('categories')->group(function () {
            Route::get('/', CategoriesIndex::class)->name('outmart.dashboard.catalog.categories.index');
            Route::get('/create', CategoryCreate::class)->name('outmart.dashboard.catalog.categories.create');
            Route::get('/{category}/edit', CategoryEdit::class)->name('outmart.dashboard.catalog.categories.edit');
        });
    });
});
