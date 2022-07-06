<?php

namespace Packages\order\src\Http\Livewire\Home\Dashboard;

use Livewire\Component;
use Livewire\WithPagination;

class OrderList extends Component
{

    use WithPagination;

    public $paginationTheme = 'new-paginate';

    public function render()
    {
        $orders = user()->orders()->latest()->paginate(10);
        return view('order::livewire.home.dashboard.order-list' , compact('orders'));
    }

}
