<?php

namespace App\Http\Livewire\Home;

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

    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.home.index-page');
    }
}
