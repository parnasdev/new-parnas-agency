<?php

namespace App\Http\Livewire\Home\Posts;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class ListBlog extends Component
{
    use WithPagination;

    public $paginationTheme = 'new-paginate';

    public function mount()
    {

    }

    public function render()
    {
        $categories = Category::query()->where('category_type' , 1)->get();
        $posts = Post::query()->where('post_type' , 'post')->where('status_id' , getStatus('publish'))->paginate(24);
        return view('livewire.home.posts.list-blog' , compact('categories', 'posts'));
    }

    public function updatedPaginators()
    {
        $this->dispatchBrowserEvent('scroll-top');
    }
}
