<?php

namespace App\Http\Livewire\Admin\Links;

use App\Http\Extra\TableFunction;
use App\Models\Link;
use Livewire\Component;
use Livewire\WithPagination;

class LinkIndex extends Component
{
    use TableFunction , WithPagination;

    public $paginationTheme = 'bootstrap';

    protected $listeners = ['delete'];

    public $perPage = 15;
    public $selected = [];
    public $action = 0;
    public $type;
    public $trash = 0;


    public $readyToLoad = false;

    public function loadLinks()
    {
        $this->readyToLoad = true;
    }

    public function mount()
    {
        $this->model = 'App\Models\Link';
    }

    public function render()
    {
        $links = $this->readyToLoad ? $this->getData($this->perPage , null , collect([])) : [];
        return view('livewire.admin.links.link-index' , compact('links'));
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

    public function changeStatus(Link $link)
    {
        $link->used = !$link->used;

        $link->save();

        $this->dispatchBrowserEvent('toast-message' , ['message' => 'عملیات انجام شد.' , 'icon' => 'success']);

    }
}
