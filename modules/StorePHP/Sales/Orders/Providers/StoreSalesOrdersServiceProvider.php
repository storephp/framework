<?php

namespace Store\Modules\StorePHP\Sales\Orders\Providers;

use Livewire\Livewire;
use Illuminate\Support\ServiceProvider;
use Store\Modules\StorePHP\Sales\Orders\Http\Livewire\OrderCreate;

class StoreSalesOrdersServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Livewire::component('store-sales-order-create', OrderCreate::class);

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'storephp-sales-orders');
    }
}
