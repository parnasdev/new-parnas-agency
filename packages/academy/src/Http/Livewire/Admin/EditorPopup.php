<?php


namespace Packages\academy\src\Http\Livewire\Admin;


use Livewire\Component;
use Packages\academy\src\Models\Episode;

class EditorPopup extends Component
{
    public $episode;

    public $index = null;
    public $show = false;

    protected $listeners = ['getData' , 'closeModal'];

    public function render()
    {
        return view('academy::livewire.admin.editor-popup');
    }

    public function getData($e)
    {
        $this->show = true;
        $this->episode = $e['value'];
        $this->index = $e['index'];
        $this->render();
    }

    public function submit()
    {
        $this->emit('setData' , ['index' => $this->index , 'value' => $this->episode]);
        $this->dispatchBrowserEvent('close-modal');
    }

    public function closeModal()
    {
        $this->show = false;
    }
}
