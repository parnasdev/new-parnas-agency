<?php

use Illuminate\Support\Facades\Route;

Route::prefix('forms')->name('forms.')->middleware(['auth:web' , 'role_access:panel'])->group(function () {
    Route::get('/' , \Packages\form\src\Http\Livewire\Admin\FormIndex::class)->name('index')->middleware('can:forms.read');
    Route::get('/inboxes/{form}' , \Packages\form\src\Http\Livewire\Admin\FormInbox::class)->name('inboxes')->middleware('can:forms.read');
    Route::get('/create' , \Packages\form\src\Http\Livewire\Admin\FormCreate::class)->name('create')->middleware('can:forms.create');
    Route::get('/edit/{form}' , \Packages\form\src\Http\Livewire\Admin\FormEdit::class)->name('edit')->middleware('can:forms.edit');
});
