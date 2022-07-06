<?php

try {
    foreach (\App\Models\Post::query()->where('post_type' , 'page')->get() as $page) {
        \Illuminate\Support\Facades\Route::get($page->slug , \App\Http\Livewire\Home\Pages\InfoPage::class);
    }
} catch (Exception $exception) {

}
