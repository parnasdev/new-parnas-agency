<?php

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

Route::get('/', \App\Http\Livewire\Home\IndexPage::class)->name('home');
Route::get('/aboutus', \App\Http\Livewire\Home\AboutPage::class)->name('aboutus');
Route::get('/contactus', \App\Http\Livewire\Home\ContactPage::class)->name('contactus');
//Route::get('/teacher', \App\Http\Livewire\Home\Pages\teacher::class);
Route::get('/portfolio', \App\Http\Livewire\Home\PortifiloList::class)->name('portifilos.index');
Route::get('/portfolio/info', \App\Http\Livewire\Home\PortifolioInfo::class)->name('portifilos.show');
Route::get('/posts', \App\Http\Livewire\Home\Posts\ListBlog::class)->name('posts.index');
Route::get('/posts/{post:slug}', \App\Http\Livewire\Home\Posts\InfoBlog::class)->name('posts.show');
Route::get('authenticate', \App\Http\Livewire\Home\Auth\AuthenticatePage::class)->name('login')->middleware('guest');

Route::prefix('user')->middleware('auth:web')->name('dashboard.')->group(function () {
    Route::get('/', \App\Http\Livewire\Home\Dashboard\IndexPage::class)->name('index');
    Route::get('/profile', \App\Http\Livewire\Home\Dashboard\ProfilePage::class)->name('profile');
});

Route::middleware(['auth:web' , 'role_access:panel'])->group(function () {
    Route::get('/builder/{page}' , \App\Http\Livewire\Admin\Builder\BuilderPage::class)->name('builder.page');
});

//Route::get('page/{post:slug}', \App\Http\Livewire\Home\Pages\InfoPage::class)->name('page');
//Route::get('/' , function () {
//   $files = \Illuminate\Support\Facades\Storage::allFiles('/uploads');
//    $matchingFiles = collect($files)->filter(function ($item) {
//        return preg_match('/(5-کتاب-برای-راه-اندازی-استارتاپ.jpg)/', $item);
//    });
//    dd($matchingFiles);
////
////// iterate through files and echo their content
//    foreach ($matchingFiles as $path) {
//        echo \Illuminate\Support\Facades\Storage::get($path);
//    }
//});
