<?php

namespace Basketin\Modules\Marketing\Providers;

use Livewire\Livewire;
use Basketin\Dashboard\Support\ServiceProvider;
use Basketin\Modules\Marketing\Http\Livewire\Coupons\CouponCreate;
use Basketin\Modules\Marketing\Http\Livewire\Coupons\CouponsIndex;
use Basketin\Modules\Marketing\Http\Livewire\Coupons\CouponUpdate;

class BasketinMarketingServiceProvider extends ServiceProvider
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
        ], 'basketin_marketing', [
            $this->addLink(
                icon:'ticket',
                name:'Coupons',
                route:'basketin.dashboard.marketing.coupons.index',
                order:10,
            ),
        ]);

        Livewire::component('basketin-marketing-coupons-index', CouponsIndex::class);
        Livewire::component('basketin-marketing-coupons-create', CouponCreate::class);
        Livewire::component('basketin-marketing-coupons-update', CouponUpdate::class);
    }
}
