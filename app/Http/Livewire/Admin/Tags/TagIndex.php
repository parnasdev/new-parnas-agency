<?php

namespace App\Http\Livewire\Admin\Tags;

use App\Http\Extra\TableFunction;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class TagIndex extends Component
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
    public $type = 1;
    public $trash = 0;

    public Tag $nTag;

    protected $queryString = ['perPage' => ['except' => 15] , 'q' => ['except' => ''] , 'orderCol', 'ordering' , 'type'];

    public $readyToLoad = false;

    public function updated($name , $value)
    {
        if ($name == 'action') {
            if ($value != 0)
                $this->actionMessage();
        }
    }


    public function loadTags()
    {
        $this->readyToLoad = true;
    }

    public function rules()
    {
        return [
          'nTag.name' => ['required' , 'string' , 'max:50']
        ];
    }

    public function mount()
    {
        $this->model = 'App\\Models\\Tag';
        $this->nTag = new Tag();
    }

    public function render()
    {

        $tags = $this->readyToLoad ? $this->getData($this->perPage , $this->q , collect([array('condition' => 'where' , 'key' => 'type' , 'value' => $this->type , 'except' => null) ,array('condition' => 'order' , 'key' => $this->orderCol , 'value' => $this->ordering , 'except' => null)]) , $this->type) : [];
        $perPages = [15 , 30 , 45 , 50];
        return view('livewire.admin.tags.tag-index' , compact('tags' , 'perPages'));
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

    public function submit()
    {
        $this->validate();
        $this->nTag->type = $this->type;
        $this->nTag->save();

        $this->dispatchBrowserEvent('toast-message' , ['message' => 'تگ شما با موفقیت ثبت شد.' , 'icon' => 'success']);

        $this->nTag = new Tag();
    }

    public function edit(Tag $tag)
    {
        $this->nTag = $tag;
    }
}
