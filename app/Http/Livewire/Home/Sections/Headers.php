<?php

namespace App\Http\Livewire\Home\Sections;

use App\PrsAuth\PrsAuth;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Packages\order\src\Http\Cart;

class Headers extends Component
{

    protected $listeners = ['updateCart' => 'render'];

    public $route;

    public function mount()
    {
        $this->route = Route::currentRouteName();
    }

    public function render()
    {
        return view('livewire.home.sections.headers');
    }

    public function logout()
    {
        Cart::deleteAll();
        PrsAuth::getArray([])->logout();
        return redirect('/');
    }
}
