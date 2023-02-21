<?php

namespace OutMart\Modules\Customers\Providers;

use Livewire\Livewire;
use OutMart\Dashboard\Support\ServiceProvider;
use OutMart\Modules\Customers\Http\Livewire\Categories\CustomerCreate;

class OutMartCustomersServiceProvider extends ServiceProvider
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
            'name' => 'Customers',
            'slug' => 'customers',
        ], 'outmart_customers', [
            $this->addLink(
                icon:'list',
                name:'Customers list',
                route:'outmart.dashboard.customers.index',
                order:10,
            ),
        ]);

        Livewire::component('outmart-customers-create', CustomerCreate::class);
    }
}
