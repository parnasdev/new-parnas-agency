<?php

namespace App\Http\Livewire\Home\Dashboard\Sections;

use App\PrsAuth\PrsAuth;
use Livewire\Component;
use Packages\order\src\Http\Cart;

class SidebarMenu extends Component
{

    protected $listeners = ['updateUser' => 'render'];

    public function render()
    {
        return view('livewire.home.dashboard.sections.sidebar-menu');
    }

    public function logout()
    {
        Cart::deleteAll();
        PrsAuth::getArray([])->logout();
        return redirect('/');

    }
}
