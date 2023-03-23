<?php

use Illuminate\Support\Facades\Route;
use OutMart\Dashboard\Http\Livewire\Home;
use OutMart\Dashboard\Http\Middleware\GlobalConfigMiddleware;

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

Route::prefix('outmart')->middleware(['web', 'auth', GlobalConfigMiddleware::class])->group(function () {
    Route::get('/', Home::class)->name('outmart.dashboard.home');
});
