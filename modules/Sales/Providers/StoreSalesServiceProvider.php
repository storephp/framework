<?php

namespace Store\Modules\Sales\Providers;

use Livewire\Livewire;
use StorePHP\Dashboard\Support\ServiceProvider;
use Store\Modules\Sales\Http\Livewire\Orders\OrderCreate;

class StoreSalesServiceProvider extends ServiceProvider
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
        ], 'store_orders', [
            $this->addLink(
                icon:'truck',
                name:'Orders',
                route:'store.dashboard.sales.orders.index',
                order:10,
            ),
        ]);

        Livewire::component('store-sales-order-create', OrderCreate::class);
    }
}
