<?php

namespace App\Http\Livewire\Home;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;

class PortifiloList extends Component
{
    public function render()
    {
        $categories = Category::query()->where('category_type' , 2)->get();
        // dd($categories[0]->files()->where('type' , 2)->first());
        $portfolios = Post::query()->where('post_type' , 'portfolio')->where('status_id' , getStatus('publish'));
        return view('livewire.home.portifilo-list', compact('portfolios', 'categories'));
    }
}
