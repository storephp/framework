<?php

use Illuminate\Support\Facades\Route;
use Store\Modules\StorePHP\Customers\Http\Livewire\CustomerCreate;
use Store\Modules\StorePHP\Customers\Http\Livewire\CustomersIndex;
use Store\Modules\StorePHP\Customers\Http\Livewire\CustomerUpdate;

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

Route::prefix('/customers')->group(function () {
    Route::get('/', CustomersIndex::class)->name('store.dashboard.customers.index');
    Route::get('/create', CustomerCreate::class)->name('store.dashboard.customers.create');
    Route::get('/{customer}/update', CustomerUpdate::class)->name('store.dashboard.customers.update');
});
