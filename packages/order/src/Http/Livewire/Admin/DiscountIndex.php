<?php

namespace Packages\order\src\Http\Livewire\Admin;

use App\Http\Extra\TableFunction;
use App\Models\Status;
use Livewire\WithPagination;

class DiscountIndex extends \Livewire\Component
{
    use TableFunction, WithPagination;

    public $paginationTheme = 'parnas';

    protected $listeners = ['delete' , 'forceDelete'  , 'restore' , 'selectedAction'];

    public $perPage = 15;
    public $q = '';
    public $orderCol = 'created_at';
    public $ordering = 'desc';
    public $selected = [];
    public $action = 0;
    public $trash = 0;

    protected $queryString = ['perPage' => ['except' => 15] , 'q' => ['except' => '']  , 'orderCol', 'ordering'];

    public $readyToLoad = false;

    public function loadDiscounts()
    {
        $this->readyToLoad = true;
    }

    public function mount()
    {
        $this->model = 'Packages\order\src\Models\Discount';
        $this->softDelete = true;
    }

    public function render()
    {
        $conditions = [array('condition' => 'order' , 'key' => $this->orderCol , 'value' => $this->ordering , 'except' => null)];

        $discounts = $this->readyToLoad ? $this->getData($this->perPage , $this->q , collect($conditions)) : [];
        $perPages = [15 , 30 , 45 , 50];

        return view('order::livewire.admin.discount-index', compact('discounts' , 'perPages'));
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
}
