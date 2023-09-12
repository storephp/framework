<?php

namespace StorePHP\Customers\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use StorePHP\Customers\Http\Livewire\CustomerCreate;
use StorePHP\Customers\Http\Livewire\CustomersIndex;
use StorePHP\Customers\Http\Livewire\CustomerUpdate;

class StorePHPCustomersServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Livewire::component('store-customers-index', CustomersIndex::class);
        Livewire::component('store-customers-create', CustomerCreate::class);
        Livewire::component('store-customers-update', CustomerUpdate::class);
    }
}
