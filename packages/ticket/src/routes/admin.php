<?php

use Illuminate\Support\Facades\Route;

Route::prefix('tickets')->name('tickets.')->middleware(['auth:web' , 'role_access:panel'])->group(function () {
    Route::get('/' , \Packages\ticket\src\Http\Livewire\Admin\TicketIndex::class)->name('index')->middleware('can:tickets.read');
    Route::get('/answer/{ticket}' , \Packages\ticket\src\Http\Livewire\Admin\TicketEdit::class)->name('edit')->middleware('can:tickets.edit');
});


