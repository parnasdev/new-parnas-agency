<?php


namespace Packages\ticket\src\Http\Livewire\Admin;


use App\Http\Extra\TableFunction;
use App\Models\Status;
use Livewire\WithPagination;
use Packages\ticket\src\Models\Ticket;

class TicketIndex extends \Livewire\Component
{
    use TableFunction , WithPagination;

    public $paginationTheme = 'parnas';

    protected $listeners = ['delete' , 'forceDelete'  , 'restore' , 'selectedAction'];

    public $perPage = 15;
    public $status = '0';
    public $q = '';
    public $orderCol = 'created_at';
    public $ordering = 'desc';
    public $selected = [];
    public $action = 0;
    public $trash = 0;

    protected $queryString = ['perPage' => ['except' => 15] , 'status' => ['except' => '0'] ,'q' => ['except' => ''] , 'trash' => ['except' => 0] , 'orderCol', 'ordering'];

    public $readyToLoad = false;

    public function loadTickets()
    {
        $this->readyToLoad = true;
    }

    public function mount()
    {
        $this->model = 'Packages\ticket\src\Models\Ticket';
    }

    public function render()
    {
        $conditions = [array('condition' => 'where' , 'key' => 'status_id' , 'value' => $this->status , 'except' => 0) , array('condition' => 'where' , 'key' => 'parent_id' , 'value' => null , 'except' => 1) , array('condition' => 'order' , 'key' => $this->orderCol , 'value' => $this->ordering , 'except' => null)];
        if ($this->trash) {
            $conditions = array_merge($conditions , [array('condition' => 'trash' , 'key' => 'd' , 'value' => null , 'except' => null)]);
        }
        $tickets = $this->readyToLoad ? $this->getData($this->perPage , $this->q , collect($conditions)) : [];
        $statuses = Status::query()->where('type' , 5)->get();
        $perPages = [15 , 30 , 45 , 50];
        return view('ticket::livewire.admin.ticket-index' , compact('tickets' , 'statuses' , 'perPages'));
    }

    public function updated($name , $value)
    {
        if ($name == 'action') {
            if ($value != 0)
                $this->actionMessage();
        }
    }

    public function actionMessage()
    {
        if (count($this->selected) > 0) {
            $this->dispatchBrowserEvent('message', ['message' => 'آیا میخواهید این عملیات انجام دهید؟', 'icon' => 'waring', 'title' => 'اطمینان دارید؟', 'btnCText' => 'بله', 'btnCAText' => 'لغو', 'event' => 'selectedAction', 'data' => null]);
        }
    }

    public function selectedAction()
    {
            if (count($this->selected) > 0) {
                switch ($this->action) {
                    case 1:
                        foreach ($this->selected as $item) {
                            if ($this->trash ?? false) {
                                $this->forceDelete($item);
                                continue;
                            }
                            $this->delete($item);
                        }
                        $this->selected = [];
                        $this->dispatchBrowserEvent('unchecked');
                        break;
                    case 2:
                        foreach ($this->selected as $item) {
                            $this->restore($item);
                        }
                        $this->selected = [];
                        $this->dispatchBrowserEvent('unchecked');
                        break;
                }
            } else {
                $this->dispatchBrowserEvent('toast-message' , ['message' => 'موردی انتخاب نشده' , 'icon' => 'error']);
            }

            $this->action = 0;
    }

    public function changeStatus(Ticket $ticket , $status)
    {
        $ticket->status_id = $status;

        $ticket->save();



        $this->dispatchBrowserEvent('toast-message' , ['message' => 'وضعیت تغییر کرد.' , 'icon' => 'success']);
    }
}
