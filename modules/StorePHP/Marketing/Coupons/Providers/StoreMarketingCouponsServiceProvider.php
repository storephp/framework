<?php

namespace StorePHP\Marketing\Coupons\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use StorePHP\Marketing\Coupons\Http\Livewire\CouponCreate;
use StorePHP\Marketing\Coupons\Http\Livewire\CouponsIndex;
use StorePHP\Marketing\Coupons\Http\Livewire\CouponUpdate;

class StoreMarketingCouponsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Livewire::component('store-marketing-coupons-index', CouponsIndex::class);
        Livewire::component('store-marketing-coupons-create', CouponCreate::class);
        Livewire::component('store-marketing-coupons-update', CouponUpdate::class);
    }
}
