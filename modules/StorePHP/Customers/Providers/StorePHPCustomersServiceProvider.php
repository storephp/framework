<?php

namespace Store\Modules\StorePHP\Customers\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Store\Modules\StorePHP\Customers\Http\Livewire\CustomerCreate;
use Store\Modules\StorePHP\Customers\Http\Livewire\CustomersIndex;
use Store\Modules\StorePHP\Customers\Http\Livewire\CustomerUpdate;

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
