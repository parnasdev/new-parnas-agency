<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Http\Extra\TableFunction;
use App\Models\Category;
use App\Models\Post;
use App\Models\Status;
use Livewire\Component;
use Livewire\WithPagination;

class PostIndex extends Component
{
    use TableFunction , WithPagination;

    public $paginationTheme = 'parnas';

    protected $listeners = ['delete' , 'forceDelete'  , 'restore' , 'selectedAction'];

    public $perPage = 15;
    public $status = '0';
    public $category = '0';
    public $q = '';
    public $post_type = 'post';
    public $orderCol = 'created_at';
    public $ordering = 'desc';
    public $selected = [];
    public $action = 0;
    public $trash = 0;

    protected $queryString = ['perPage' => ['except' => 15] , 'status' => ['except' => '0'] , 'category' => ['except' => '0'] , 'q' => ['except' => ''] , 'trash' => ['except' => 0] , 'orderCol', 'ordering', 'post_type'];

    public $readyToLoad = false;

    public $currentIds = [];

    public function loadPosts()
    {
        $this->readyToLoad = true;
    }

    public function mount()
    {
        $this->model = 'App\Models\Post';
        $this->softDelete = true;
    }

    public function render()
    {
        $conditions = [array('condition' => 'where' , 'key' => 'status_id' , 'value' => $this->status , 'except' => 0) , array('condition' => 'whereHas' , 'key' => 'id' , 'rel' => 'categories' , 'value' => $this->category , 'except' => 0) , array('condition' => 'where' , 'key' => 'post_type' , 'value' => $this->post_type , 'except' => null) , array('condition' => 'order' , 'key' => $this->orderCol , 'value' => $this->ordering , 'except' => null)];
        if ($this->trash) {
            $conditions = array_merge($conditions , [array('condition' => 'trash' , 'key' => 'd' , 'value' => null , 'except' => null)]);
        }
        $posts = $this->readyToLoad ? $this->getData($this->perPage , $this->q , collect($conditions)) : [];
        $statuses = Status::query()->where('type' , 1)->get();
        $categories = Category::query()->where('category_type' , 1)->get();
        $perPages = [15 , 30 , 45 , 50];
        if ($this->readyToLoad)
            $this->currentIds = $posts->pluck('id')->toArray();
        return view('livewire.admin.posts.post-index' , compact('posts' , 'statuses' , 'perPages' , 'categories'));
    }

    public function updated($name , $value)
    {
        if ($name == 'action') {
            if ($value != 0)
                $this->actionMessage();
        }
    }

    public function changeStatus($id , $status)
    {
        $this->model::find($id)->update([
            'status_id' => $status
        ]);

        $this->dispatchBrowserEvent('toast-message' , ['message' => '?????????? ?????????? ??????.' , 'icon' => 'success']);
    }

    public function showTrash()
    {
        $this->trash = $this->trash == 0 ? 1 : 0;
    }

    public function actionMessage()
    {
        if (count($this->selected) > 0) {
            $this->dispatchBrowserEvent('message', ['message' => '?????? ???????????????? ?????? ???????????? ?????????? ??????????', 'icon' => 'waring', 'title' => '?????????????? ????????????', 'btnCText' => '??????', 'btnCAText' => '??????', 'event' => 'selectedAction', 'data' => null]);
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
            $this->dispatchBrowserEvent('toast-message' , ['message' => '?????????? ???????????? ????????' , 'icon' => 'error']);
        }

        $this->action = 0;
    }
}
