<?php

namespace App\Http\Livewire\Admin\Section;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;
use Packages\order\src\Models\Order;
use Packages\ticket\src\Models\Ticket;

class SidebarPanel extends Component
{
    public $today_order = 0;
    public $tickets = 0;

    public function mount()
    {
        $this->today_order = Order::query()->whereDay('created_at' , now())->get()->count();
        $this->tickets = Ticket::query()->where('status_id' , getStatus('new'))->orWhere('status_id' , getStatus('user_answer'))->get()->count();
    }

    public function render()
    {
        return view('livewire.admin.section.sidebar-panel');
    }
}
