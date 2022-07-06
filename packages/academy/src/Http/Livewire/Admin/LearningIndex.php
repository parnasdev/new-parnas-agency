<?php


namespace Packages\academy\src\Http\Livewire\Admin;


use App\Http\Extra\TableFunction;
use App\Models\Post;
use Livewire\WithPagination;
use Packages\academy\src\Models\Learning;

class LearningIndex extends \Livewire\Component
{
    use WithPagination , TableFunction;

    public $q = '';

    protected $queryString = ['q' => ['except' => '']];

    public Post $post;

    protected $listeners = ['updateData' , 'delete'];

    public $readyToLoad = false;

    public function loadLearnings()
    {
        $this->readyToLoad = true;
    }

    public function mount() {
        $this->model = 'Packages\academy\src\Models\Learning';
    }

    public function render()
    {

        $learnings = $this->post->learnings();

        if ($this->q != '') {
            $learnings->whereHas('user' , function ($query) {
                $query->where('name' , "%{$this->q}%")->orWhere('family' , "%{$this->q}%")
                    ->orWhere('phone' , "%{$this->q}%");
            });
        }

        $seasons = $this->post->seasons()->where('parent' , null)->whereNot('free' , true)->get();

        return view('academy::livewire.admin.learning-index' , [
            'learnings' => $learnings->paginate(30),
            'seasons' => $seasons
        ]);
    }

    public function edit(Learning $learning)
    {
        $this->emit('getData' , $learning->id);

        $this->dispatchBrowserEvent('open-modal');
    }

    public function updateData()
    {
        $this->render();
    }

    public function actionMessage()
    {
        // TODO: Implement actionMessage() method.
    }

    public function selectedAction()
    {
        // TODO: Implement selectedAction() method.
    }
}
