<?php

namespace App\Http\Livewire\Admin\SettingHome;

use App\Models\Setting;
use Illuminate\Support\Collection;
use Livewire\Component;

class Slider extends Component
{

    public array $files = [];

    public $file = [
        'url' => null,
        'alt' => null,
        'link' => null
    ];

    protected $listeners = ['upload' , 'changeFile'];

    public function render()
    {
        return view('livewire.admin.setting-home.slider');
    }

    public function upload()
    {
        $this->validate([
            'file.url' => ['required'],
            'file.alt' => ['nullable' , 'string' , 'max:100'],
        ]);

        $this->files = collect($this->files)->push([
            'url' => $this->file['url'],
            'alt' => $this->file['alt'],
            'link' => $this->file['link'],
        ])->toArray();

        $this->emit('updatedData' , ['index' => 'slider' , 'value' => $this->files]);

        $this->resetForm();
    }

    public function resetForm()
    {
        $this->file = [
            'url' => null,
            'alt' => null,
            'link' => null,
        ];
    }

    public function deleteFile($index)
    {
        array_splice($this->files , $index , 1);
        $this->emit('updatedData' , ['index' => 'slider' , 'value' => $this->files]);
    }

    public function editFile($index)
    {
        $this->emit('getData' , ['value' => $this->files[$index] , 'index' => $index]);
        $this->dispatchBrowserEvent('open-modal');
    }

    public function changeFile($e)
    {
        collect($this->files)->put($e['index'] , $e['value']);
        $this->dispatchBrowserEvent('toastMessage' , ['message' => 'فایل شما آپدیت شد.' , 'icon' => 'success']);
    }
}
