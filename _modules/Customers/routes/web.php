<?php

use Illuminate\Support\Facades\Route;
use Store\Modules\Customers\Http\Livewire\Categories\CustomerCreate;
use Store\Modules\Customers\Http\Livewire\Categories\CustomersIndex;

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
Route::prefix('/')->group(function () {
    Route::get('/', CustomersIndex::class)->name('store.dashboard.customers.index');
    Route::get('/create', CustomerCreate::class)->name('store.dashboard.customers.create');
});
