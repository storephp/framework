<?php

namespace Store\Modules\Marketing\Providers;

use Livewire\Livewire;
use StorePHP\Dashboard\Support\ServiceProvider;
use Store\Modules\Marketing\Http\Livewire\Coupons\CouponCreate;
use Store\Modules\Marketing\Http\Livewire\Coupons\CouponsIndex;
use Store\Modules\Marketing\Http\Livewire\Coupons\CouponUpdate;

class StoreMarketingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootModuleAPP(__DIR__ . '/..', [
            'icon' => 'speakerphone',
            'name' => 'Marketing',
            'slug' => 'marketing',
        ], 'store_marketing', [
            $this->addLink(
                icon:'ticket',
                name:'Coupons',
                route:'store.dashboard.marketing.coupons.index',
                order:10,
            ),
        ]);

        Livewire::component('store-marketing-coupons-index', CouponsIndex::class);
        Livewire::component('store-marketing-coupons-create', CouponCreate::class);
        Livewire::component('store-marketing-coupons-update', CouponUpdate::class);
    }
}
