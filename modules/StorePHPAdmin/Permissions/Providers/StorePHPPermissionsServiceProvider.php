<?php

namespace Store\Modules\StorePHPAdmin\Permissions\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Store\Modules\StorePHPAdmin\Permissions\Http\Livewire\Admins\AdminCreate;
use Store\Modules\StorePHPAdmin\Permissions\Http\Livewire\Admins\AdminsIndex;
use Store\Modules\StorePHPAdmin\Permissions\Http\Livewire\Admins\AdminUpdate;

class StorePHPPermissionsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'storephp-dashboard');

        Livewire::component('store-permissions-admin-create', AdminsIndex::class);
        Livewire::component('store-permissions-admin-create', AdminCreate::class);
        Livewire::component('store-permissions-admin-update', AdminUpdate::class);
    }
}
