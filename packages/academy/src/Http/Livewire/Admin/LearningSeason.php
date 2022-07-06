<?php


namespace Packages\academy\src\Http\Livewire\Admin;


use App\Models\Post;
use Livewire\Component;
use Packages\academy\src\Models\Learning;

class LearningSeason extends Component
{
    public $seasons = [];
    public Learning | null $learning;

    protected $listeners = ['getData'];

    public function rules()
    {
        return [
            'learning.season_unlock' => ['required']
        ];
    }

    public function render()
    {
        return view('academy::livewire.admin.learning-season');
    }

    public function getData(Learning $e)
    {
        $this->learning = $e;
    }

    public function submit()
    {
        $this->validate();

        $this->learning->save();

        $this->emit('updateData');

        $this->dispatchBrowserEvent('close-modal');
    }

}
