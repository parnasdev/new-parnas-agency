<?php

namespace Packages\ticket\src\Http\Livewire\Home\Dashboard;

use Livewire\Component;
use Livewire\WithPagination;
use Packages\ticket\src\Models\Ticket;

class TicketPage extends Component
{

    use WithPagination;

    public $paginationTheme = 'new-paginate';

    public function render()
    {
        $tickets = user()->tickets()->whereNull('parent_id')->paginate(10);
        return view('ticket::livewire.home.dashboard.ticket-page' , compact('tickets'));
    }

}
