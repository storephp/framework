<?php

namespace Store\Modules\StorePHPAdmin\Permissions\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Store\Modules\StorePHPAdmin\Permissions\Http\Livewire\Admins\AdminCreate;
use Store\Modules\StorePHPAdmin\Permissions\Http\Livewire\Admins\AdminsIndex;
use Store\Modules\StorePHPAdmin\Permissions\Http\Livewire\Admins\AdminUpdate;
use Store\Modules\StorePHPAdmin\Permissions\Http\Livewire\Roles\RoleCreate;
use Store\Modules\StorePHPAdmin\Permissions\Http\Livewire\Roles\RolesIndex;
use Store\Modules\StorePHPAdmin\Permissions\Http\Livewire\Roles\RoleUpdate;

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

        Livewire::component('store-permissions-admin-index', AdminsIndex::class);
        Livewire::component('store-permissions-admin-create', AdminCreate::class);
        Livewire::component('store-permissions-admin-update', AdminUpdate::class);

        Livewire::component('store-permissions-roles-index', RolesIndex::class);
        Livewire::component('store-permissions-roles-create', RoleCreate::class);
        Livewire::component('store-permissions-roles-update', RoleUpdate::class);
    }
}
