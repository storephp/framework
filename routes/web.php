<?php

use Bidaea\OutMart\Dashboard\Http\Livewire\Home;
use Illuminate\Support\Facades\Route;

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

Route::prefix('outmart')->group(function () {
    Route::get('/', Home::class)->name('outmart.dashboard.home');
});
