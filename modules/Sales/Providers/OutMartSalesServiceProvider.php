<?php

namespace OutMart\Modules\Sales\Providers;

use Livewire\Livewire;
use OutMart\Dashboard\Support\ServiceProvider;
use OutMart\Modules\Customers\Http\Livewire\Categories\CustomerCreate;
use OutMart\Modules\Sales\Http\Livewire\Orders\OrderCreate;

class OutMartSalesServiceProvider extends ServiceProvider
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
        ], 'outmart_orders', [
            $this->addLink(
                icon:'truck',
                name:'Orders',
                route:'outmart.dashboard.sales.orders.index',
                order:10,
            ),
        ]);

        Livewire::component('outmart-sales-order-create', OrderCreate::class);
    }
}
