<?php

namespace Basketin\Modules\Customers\Providers;

use Livewire\Livewire;
use Basketin\Dashboard\Support\ServiceProvider;
use Basketin\Modules\Customers\Http\Livewire\Categories\CustomerCreate;

class BasketinCustomersServiceProvider extends ServiceProvider
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
            'name' => 'basketinCustomers::main.sidebar.customers',
            'slug' => 'customers',
        ], 'basketin_customers', [
            $this->addLink(
                icon:'list',
                name:'basketinCustomers::main.sidebar.customersList',
                route:'basketin.dashboard.customers.index',
                order:10,
            ),
        ]);

        Livewire::component('basketin-customers-create', CustomerCreate::class);
    }
}
