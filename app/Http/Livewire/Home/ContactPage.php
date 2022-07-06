<?php

namespace App\Http\Livewire\Home;

use App\Models\Post;
use Livewire\Component;

class ContactPage extends Component
{
    public $links = [];

    public Post $post;

    public function mount()
    {
        $this->links = [
            ['title' => 'تماس با ما', 'href' => url()->current()]
        ];
    }

    public function render()
    {
        return view('livewire.home.contact-page');
    }
}
