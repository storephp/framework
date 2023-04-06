<?php

use Illuminate\Support\Facades\Route;
use Basketin\Modules\Marketing\Http\Livewire\Coupons\CouponCreate;
use Basketin\Modules\Marketing\Http\Livewire\Coupons\CouponsIndex;
use Basketin\Modules\Marketing\Http\Livewire\Coupons\CouponUpdate;

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
    Route::get('/', CouponsIndex::class)->name('basketin.dashboard.marketing.coupons.index');
    Route::get('/create', CouponCreate::class)->name('basketin.dashboard.marketing.coupons.create');
    Route::get('/{id}/update', CouponUpdate::class)->name('basketin.dashboard.marketing.coupons.update');
});
