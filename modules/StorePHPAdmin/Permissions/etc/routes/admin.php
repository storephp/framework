<?php

use Illuminate\Support\Facades\Route;
use Store\Modules\StorePHPAdmin\Permissions\Http\Livewire\Admins\AdminCreate;
use Store\Modules\StorePHPAdmin\Permissions\Http\Livewire\Admins\AdminsIndex;
use Store\Modules\StorePHPAdmin\Permissions\Http\Livewire\Admins\AdminUpdate;
use Store\Modules\StorePHPAdmin\Permissions\Http\Livewire\Roles\RoleCreate;
use Store\Modules\StorePHPAdmin\Permissions\Http\Livewire\Roles\RolesIndex;
use Store\Modules\StorePHPAdmin\Permissions\Http\Livewire\Roles\RoleUpdate;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */



Route::prefix('permissions')->group(function () {
    Route::prefix('admins')->group(function () {
        Route::get('/', AdminsIndex::class)->name('store.dashboard.permissions.admins.index');
        Route::get('/create', AdminCreate::class)->name('store.dashboard.permissions.admins.create');
        Route::get('/{admin}/update', AdminUpdate::class)->name('store.dashboard.permissions.admins.update');
    });

    Route::prefix('roles')->group(function () {
        Route::get('/', RolesIndex::class)->name('store.dashboard.permissions.roles.index');
        Route::get('/create', RoleCreate::class)->name('store.dashboard.permissions.roles.create');
        Route::get('/{role}/update', RoleUpdate::class)->name('store.dashboard.permissions.roles.update');
    });
});
