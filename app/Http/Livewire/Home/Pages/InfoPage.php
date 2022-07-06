<?php

namespace App\Http\Livewire\Home\Pages;

use App\Models\Post;
use Artesaos\SEOTools\Facades\SEOTools;
use Livewire\Component;
use Packages\multilang\src\WithMultiLang;

class InfoPage extends Component
{

    public Post $post;

    public ?string $lang = 'fa';

    protected $queryString = ['lang' => ['except' => 'fa']];

    use WithMultiLang;

    public function mount()
    {

        $url = url()->current();
        $array = explode('/', $url);

        $this->getSessionLang();

        session()->put('lang', $this->lang);

        $this->post = Post::query()->where('post_type', 'page')->whereSlug(urldecode($array[count($array) - 1]))->firstOrFail();

        SEOTools::setTitle($this->post->title);

        abort_if($this->post->status_id != getStatus('publish'), 404);
    }

    public function render()
    {
        return view('livewire.home.pages.info-page')->layout($this->post->options['master']);
    }

    public function updated($name)
    {
    }


}
