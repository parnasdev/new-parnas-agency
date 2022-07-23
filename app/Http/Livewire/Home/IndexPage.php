<?php

namespace App\Http\Livewire\Home;

use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Livewire\Component;
use Packages\multilang\src\WithMultiLang;

class IndexPage extends Component
{

    public $readyToLoad = false;
    public $searchKey = '';

    public function loadPosts()
    {
        $this->readyToLoad = true;
    }

    public function mount()
    {
        // dd($this->getCategory(1));
    }

    public function search(){

    }

    public function render()
    {
        $posts = $this->readyToLoad ? Post::query()->where('post_type' , 'post')->where('status_id' , getStatus('publish'))->take(7)->get() : [];
        return view('livewire.home.index-page', compact('posts'));
    }

    public function getCategory($type)
    {
        return Category::query()->where('category_type' , $type)->get();
    }
}
