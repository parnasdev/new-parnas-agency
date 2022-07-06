<?php

use Illuminate\Support\Facades\Route;

Route::prefix('courses')->name('courses.')->group(function () {
    Route::get('/' , \Packages\academy\src\Http\Livewire\Home\ListCourse::class)->name('index');
    Route::get('category/{category:slug?}' , \Packages\academy\src\Http\Livewire\Home\ListCourse::class)->name('category');
    Route::get('/{course:slug}' , \Packages\academy\src\Http\Livewire\Home\InfoCourse::class)->name('show');
    Route::get('/{course:slug}/seasons/{season:slug}' , \Packages\academy\src\Http\Livewire\Home\InfoSeasons::class)->name('season')->middleware('checklearing');
});

Route::prefix('user')->name('dashboard.')->middleware('auth:web')->group(function () {
    Route::get('/courses' , \Packages\academy\src\Http\Livewire\Home\Dashboard\CoursesPage::class)->name('courses');
});
