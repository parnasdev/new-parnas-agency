<?php
use Illuminate\Support\Facades\Route;
Route::prefix('user')->middleware('auth:web')->name('dashboard.')->group(function () {
    Route::get('/tickets', \Packages\ticket\src\Http\Livewire\Home\Dashboard\TicketPage::class)->name('tickets');
    Route::get('/tickets/create', \Packages\ticket\src\Http\Livewire\Home\Dashboard\TicketCreatePage::class)->name('tickets.create');
    Route::get('/tickets/{ticket}', \Packages\ticket\src\Http\Livewire\Home\Dashboard\TicketShowPage::class)->name('tickets.show');
});
