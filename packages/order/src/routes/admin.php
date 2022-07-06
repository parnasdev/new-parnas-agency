<?php

use Illuminate\Support\Facades\Route;

Route::prefix('orders')->name('orders.')->middleware(['auth:web' , 'role_access:panel'])->group(function () {
    Route::get('/' , \Packages\order\src\Http\Livewire\Admin\OrderIndex::class)->name('index')->middleware('can:orders.read');
    Route::get('/{order}' , \Packages\order\src\Http\Livewire\Admin\OrderShow::class)->name('show')->middleware('can:orders.read');
});

Route::prefix('discounts')->name('discounts.')->middleware(['auth:web' , 'role_access:panel'])->group(function () {
    Route::get('/' , \Packages\order\src\Http\Livewire\Admin\DiscountIndex::class)->name('index')->middleware('can:discounts.read');
    Route::get('/create' , \Packages\order\src\Http\Livewire\Admin\DiscountCreate::class)->name('create')->middleware('can:discounts.create');
    Route::get('/edit/{discount}' , \Packages\order\src\Http\Livewire\Admin\DiscountEdit::class)->name('edit')->middleware('can:discounts.edit');
});
