<?php


namespace Packages\form\src\Http\Livewire\Admin;


use App\Http\Extra\TableFunction;
use Livewire\WithPagination;

class FormIndex extends \Livewire\Component
{
    use TableFunction , WithPagination;

    public $paginationTheme = 'parnas';

    protected $listeners = ['delete' , 'forceDelete'  , 'restore' , 'selectedAction'];

    public $perPage = 15;
    public $q = '';
    public $orderCol = 'created_at';
    public $ordering = 'desc';
    public $selected = [];
    public $action = 0;

    protected $queryString = ['perPage' => ['except' => 15] , 'q' => ['except' => ''], 'orderCol', 'ordering'];

    public $readyToLoad = false;

    public function loadForms()
    {
        $this->readyToLoad = true;
    }

    public function mount()
    {
        $this->model = 'Packages\form\src\Models\Form';
    }

    public function render()
    {
        $conditions = [array('condition' => 'order' , 'key' => $this->orderCol , 'value' => $this->ordering , 'except' => null)];
        $forms = $this->readyToLoad ? $this->getData($this->perPage , $this->q , collect($conditions)) : [];
        $perPages = [15 , 30 , 45 , 50];
        return view('form::livewire.admin.form-index' , compact('forms' , 'perPages'));
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
                        $this->delete($item);
                    }
                    $this->selected = [];
            }
        } else {
            $this->dispatchBrowserEvent('toastMessage' , ['message' => 'موردی انتخاب نشده' , 'icon' => 'error']);
        }

        $this->action = 0;
    }
}
