<?php

namespace App\Http\Livewire\Home\Posts;

use App\Models\Post;
use Artesaos\SEOTools\Facades\SEOTools;
use Livewire\Component;
use Livewire\WithPagination;
use Packages\multilang\src\WithMultiLang;

class ListBlog extends Component
{
    use WithPagination;

    public $paginationTheme = 'new-paginate';

    public ?string $lang = 'fa';

    protected $queryString = ['lang' => ['except' => 'fa']];

    use WithMultiLang;

    public function mount()
    {
        $this->getSessionLang();

        session()->put('lang' , $this->lang);
    }

    public function render()
    {
        $posts = Post::query()->where('post_type' , 'post')->where('lang' , $this->lang)->where('status_id' , getStatus('publish'))->paginate(24);
        return view('livewire.home.posts.list-blog' , compact('posts'));
    }

    public function updatedPaginators()
    {
        $this->dispatchBrowserEvent('scroll-top');
    }
}
