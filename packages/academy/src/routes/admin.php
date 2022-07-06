<?php

use Illuminate\Support\Facades\Route;

Route::prefix('courses')->name('courses.')->middleware(['auth:web' , 'role_access:panel'])->group(function () {
        Route::get('/' , \Packages\academy\src\Http\Livewire\Admin\CourseIndex::class)->name('index')->middleware('can:courses.read');
        Route::get('/create' , \Packages\academy\src\Http\Livewire\Admin\CourseCreate::class)->name('create')->middleware('can:courses.create');
        Route::get('/edit/{post}' , \Packages\academy\src\Http\Livewire\Admin\CourseEdit::class)->name('edit')->middleware('can:courses.edit');
});

Route::prefix('seasons')->name('seasons.')->middleware(['auth:web' , 'role_access:panel'])->group(function () {
    Route::get('/{post}' , \Packages\academy\src\Http\Livewire\Admin\SeasonIndex::class)->name('index')->middleware('can:courses.read');
    Route::get('/edit/{season}' , \Packages\academy\src\Http\Livewire\Admin\SeasonEdit::class)->name('edit')->middleware('can:courses.edit');
});

Route::prefix('episodes')->name('episodes.')->middleware(['auth:web' , 'role_access:panel'])->group(function () {
    Route::get('/{post}' , \Packages\academy\src\Http\Livewire\Admin\EpisodeIndex::class)->name('index')->middleware('can:courses.read');
    Route::get('/edit/{episode}' , \Packages\academy\src\Http\Livewire\Admin\EpisodeEdit::class)->name('edit')->middleware('can:courses.edit');
});

Route::prefix('learnings')->name('learnings.')->middleware(['auth:web' , 'role_access:panel'])->group(function () {
    Route::get('/{post}' , \Packages\academy\src\Http\Livewire\Admin\LearningIndex::class)->name('index')->middleware('can:leanings.read');
});

Route::prefix('academy')->name('academy.')->middleware(['auth:web' , 'role_access:panel'])->group(function () {
    Route::get('/setting' , \Packages\academy\src\Http\Livewire\Admin\AcademySetting::class)->name('index')->middleware('can:settings.read');
});
