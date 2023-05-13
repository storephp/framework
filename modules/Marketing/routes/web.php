<?php

use Illuminate\Support\Facades\Route;
use Store\Modules\Marketing\Http\Livewire\Coupons\CouponCreate;
use Store\Modules\Marketing\Http\Livewire\Coupons\CouponsIndex;
use Store\Modules\Marketing\Http\Livewire\Coupons\CouponUpdate;

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
Route::prefix('coupons')->group(function () {
    Route::get('/', CouponsIndex::class)->name('store.dashboard.marketing.coupons.index');
    Route::get('/create', CouponCreate::class)->name('store.dashboard.marketing.coupons.create');
    Route::get('/{id}/update', CouponUpdate::class)->name('store.dashboard.marketing.coupons.update');
});
