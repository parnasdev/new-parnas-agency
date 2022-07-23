<?php

namespace App\Http\Livewire\Home\Sections;

use App\Models\Post;
use App\PrsAuth\PrsAuth;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Packages\order\src\Http\Cart;

class Headers extends Component
{

    protected $listeners = ['updateCart' => 'render'];

    public $searchKey = '';

    public $route;

    public function mount()
    {
        $this->route = Route::currentRouteName();
    }

    public function render()
    {
        if ($this->searchKey == '') {
            $searchResults = [];
        } else {
            $searchResults = Post::query()->search($this->searchKey)->get();
        }
        return view('livewire.home.sections.headers', compact('searchResults'));
    }

    public function logout()
    {
        Cart::deleteAll();
        PrsAuth::getArray([])->logout();
        return redirect('/');
    }

    public function search()
    {
        $this->render();
    }
}
