<?php

namespace Basketin\Modules\Sales\Providers;

use Livewire\Livewire;
use Basketin\Dashboard\Support\ServiceProvider;
use Basketin\Modules\Sales\Http\Livewire\Orders\OrderCreate;

class BasketinSalesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootModuleAPP(__DIR__ . '/..', [
            'icon' => 'currency-pound',
            'name' => 'Sales',
            'slug' => 'sales',
        ], 'basketin_orders', [
            $this->addLink(
                icon:'truck',
                name:'Orders',
                route:'basketin.dashboard.sales.orders.index',
                order:10,
            ),
        ]);

        Livewire::component('basketin-sales-order-create', OrderCreate::class);
    }
}
