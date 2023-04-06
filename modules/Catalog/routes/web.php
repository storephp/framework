<?php

use Illuminate\Support\Facades\Route;
use Basketin\Modules\Catalog\Http\Livewire\Categories\CategoriesIndex;
use Basketin\Modules\Catalog\Http\Livewire\Categories\CategoryCreate;
use Basketin\Modules\Catalog\Http\Livewire\Categories\CategoryEdit;
use Basketin\Modules\Catalog\Http\Livewire\Products\ProductCreate;
use Basketin\Modules\Catalog\Http\Livewire\Products\ProductEdit;
use Basketin\Modules\Catalog\Http\Livewire\Products\ProductsIndex;

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
Route::prefix('categories')->group(function () {
    Route::get('/', CategoriesIndex::class)->name('basketin.dashboard.catalog.categories.index');
    Route::get('/create', CategoryCreate::class)->name('basketin.dashboard.catalog.categories.create');
    Route::get('/{category}/edit', CategoryEdit::class)->name('basketin.dashboard.catalog.categories.edit');
});


Route::prefix('products')->group(function () {
    Route::get('/', ProductsIndex::class)->name('basketin.dashboard.catalog.products.index');
    Route::get('/create-{productType}', ProductCreate::class)->name('basketin.dashboard.catalog.products.create');
    Route::get('/{product}/edit', ProductEdit::class)->name('basketin.dashboard.catalog.products.edit');
});
