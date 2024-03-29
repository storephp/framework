<?php

use Illuminate\Support\Facades\Route;
use StorePHP\Marketing\Coupons\Http\Livewire\CouponCreate;
use StorePHP\Marketing\Coupons\Http\Livewire\CouponsIndex;
use StorePHP\Marketing\Coupons\Http\Livewire\CouponUpdate;

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

Route::prefix('/marketing')->group(function () {
    Route::prefix('/coupons')->group(function () {
        Route::get('/', CouponsIndex::class)->name('store.dashboard.marketing.coupons.index');
        Route::get('/create', CouponCreate::class)->name('store.dashboard.marketing.coupons.create');
        Route::get('/{coupon}/update', CouponUpdate::class)->name('store.dashboard.marketing.coupons.update');
    });
});
