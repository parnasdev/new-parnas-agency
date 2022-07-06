<?php

namespace App\Http\Livewire\Admin\Builder;

use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class BuilderPage extends Component
{
    use WithFileUploads;

    public Post $page;

    public array $components;

    public $photo;

    public function rules()
    {
        return [
            'page.body' => ['required']
        ];
    }

    public function updated()
    {
    }

    public function mount()
    {
        $this->components = json_decode(File::get(base_path('/jsons/components.json')));
    }

    public function render()
    {
        return view('livewire.admin.builder.builder-page');
    }

    public function submit()
    {
        $this->validate();

        $this->page->save();

        return redirect(route('admin.pages.index'));
    }

    public function uploadFile()
    {
        $this->validate([
            'photo' => ['required']
        ]);

      return url('uploads/' . $this->photo->store('pagebuilder' , 'uploads'));
    }
}
