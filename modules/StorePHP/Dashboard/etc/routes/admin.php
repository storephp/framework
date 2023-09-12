<?php

use Illuminate\Support\Facades\Route;
use StorePHP\Dashboard\Http\Livewire\HomeViewComponent;

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

Route::get('/', HomeViewComponent::class)->name('store.dashboard.home');
