<?php

use Illuminate\Support\Facades\Route;
use Store\Modules\StorePHPAdmin\Permissions\Http\Livewire\Admins\AdminCreate;
use Store\Modules\StorePHPAdmin\Permissions\Http\Livewire\Admins\AdminsIndex;
use Store\Modules\StorePHPAdmin\Permissions\Http\Livewire\Admins\AdminUpdate;

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
});
