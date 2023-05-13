<?php

use Illuminate\Support\Facades\Route;
use Store\Modules\Sales\Http\Livewire\Orders\OrderCreate;
use Store\Modules\Sales\Http\Livewire\Orders\OrderShow;
use Store\Modules\Sales\Http\Livewire\Orders\OrdersIndex;

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
Route::prefix('orders')->group(function () {
    Route::get('/', OrdersIndex::class)->name('store.dashboard.sales.orders.index');
    Route::get('/create/{customer?}', OrderCreate::class)->name('store.dashboard.sales.orders.create');
    Route::get('/{order}', OrderShow::class)->name('store.dashboard.sales.orders.show');
});
