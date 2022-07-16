<?php

namespace App\Http\Livewire\Home;

use App\Models\Post;
use Livewire\Component;

class PortifolioInfo extends Component
{
    public Post $portfolio;

    public function render()
    {
        return view('livewire.home.portifolio-info');
    }
}
