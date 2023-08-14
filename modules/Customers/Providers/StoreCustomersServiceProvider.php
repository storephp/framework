<?php

namespace Store\Modules\Customers\Providers;

use Livewire\Livewire;
use StorePHP\Dashboard\Support\ServiceProvider;
use Store\Modules\Customers\Http\Livewire\Categories\CustomerCreate;

class StoreCustomersServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootModuleAPP(__DIR__ . '/..', [
            'icon' => 'users',
            'name' => 'storeCustomers::main.sidebar.customers',
            'slug' => 'customers',
        ], 'store_customers', [
            $this->addLink(
                icon:'list',
                name:'storeCustomers::main.sidebar.customersList',
                route:'store.dashboard.customers.index',
                order:10,
            ),
        ]);

        Livewire::component('store-customers-create', CustomerCreate::class);
    }
}
