<?php

use Illuminate\Support\Facades\Route;

Route::get('/cart' , \Packages\order\src\Http\Livewire\Home\CartList::class)->name('cart');

Route::prefix('user')->middleware('auth:web')->name('dashboard.')->group(function () {
    Route::get('/orders', \Packages\order\src\Http\Livewire\Home\Dashboard\OrderList::class)->name('orders');
    Route::get('/orders/{order}', \Packages\order\src\Http\Livewire\Home\Dashboard\OrderInfo::class)->name('orders.show');
});
