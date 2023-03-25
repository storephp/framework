<?php

namespace OutMart\Modules\Marketing\Providers;

use Livewire\Livewire;
use OutMart\Dashboard\Support\ServiceProvider;
use OutMart\Modules\Marketing\Http\Livewire\Coupons\CouponCreate;
use OutMart\Modules\Marketing\Http\Livewire\Coupons\CouponsIndex;
use OutMart\Modules\Marketing\Http\Livewire\Coupons\CouponUpdate;

class OutMartMarketingServiceProvider extends ServiceProvider
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
        ], 'outmart_marketing', [
            $this->addLink(
                icon:'ticket',
                name:'Coupons',
                route:'outmart.dashboard.marketing.coupons.index',
                order:10,
            ),
        ]);

        Livewire::component('outmart-marketing-coupons-index', CouponsIndex::class);
        Livewire::component('outmart-marketing-coupons-create', CouponCreate::class);
        Livewire::component('outmart-marketing-coupons-update', CouponUpdate::class);
    }
}
