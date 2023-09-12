<?php

use Illuminate\Support\Facades\Route;
use StorePHP\Sales\Orders\Http\Livewire\OrderCreate;
use StorePHP\Sales\Orders\Http\Livewire\OrderShow;
use StorePHP\Sales\Orders\Http\Livewire\OrdersIndex;

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

Route::prefix('/sales')->group(function () {
    Route::prefix('orders')->group(function () {
        Route::get('/', OrdersIndex::class)->name('store.dashboard.sales.orders.index');
        Route::get('/create/{customer?}', OrderCreate::class)->name('store.dashboard.sales.orders.create');
        Route::get('/{order}', OrderShow::class)->name('store.dashboard.sales.orders.show');
    });
});
