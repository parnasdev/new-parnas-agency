<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;

class AboutPage extends Component
{
    public $links = [];

    public function mount()
    {
        $this->links = [
            ['title' => 'درباره ما', 'href' => url()->current()]
        ];
    }

    public function render()
    {
        return view('livewire.home.about-page');
    }
}
