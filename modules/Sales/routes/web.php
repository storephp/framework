<?php

use Illuminate\Support\Facades\Route;
use Basketin\Modules\Sales\Http\Livewire\Orders\OrderCreate;
use Basketin\Modules\Sales\Http\Livewire\Orders\OrderShow;
use Basketin\Modules\Sales\Http\Livewire\Orders\OrdersIndex;

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
    Route::get('/', OrdersIndex::class)->name('basketin.dashboard.sales.orders.index');
    Route::get('/create/{customer?}', OrderCreate::class)->name('basketin.dashboard.sales.orders.create');
    Route::get('/{order}', OrderShow::class)->name('basketin.dashboard.sales.orders.show');
});
