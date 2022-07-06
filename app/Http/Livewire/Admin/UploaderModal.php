<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class UploaderModal extends Component
{
    use WithFileUploads;

    public $files;

    public $maxItems = 1;

    public $rules = [
        'files' => ['required' , 'file' , 'max:5120']
    ];

    public $direction = 'photos';

    public $selectedFiles = [];

    public $file_type = 1;

    protected $listeners = ['getData_fileManager'];

    public $folderSelected = '/';

    public $model = '';

    public $type = 'all';

    public function mount()
    {

    }

    public function render()
    {
        $iconFolders = File::directories(public_path('icons'));
        $icons = [];
        if ($this->folderSelected != '/')
            $icons = File::files($this->folderSelected);
        return view('livewire.admin.uploader-modal' , compact('iconFolders' , 'icons'));
    }

    public function getfiles($json = false) {
        $data = collect(File::allFiles(public_path('/uploads')))->sortByDesc(function ($file) {
            return $file->getCTime();
        })->map(function ($item) {
            return [
                'url' => Storage::disk('uploads')->url($item->getRelativePathname()),
                'path' => $item->getPathname(),
                'size' => $item->getSize(),
                'filename' => $item->getBasename(),
                'type' => File::mimeType($item->getPathname())
            ];
        })->values();

        if ($this->type != 'all')
        {
            $data = $data->map(function ($item) {
                if (str_starts_with($item['type'] , $this->type))
                    return $item;
            })->filter(function ($value) {
                return $value != null;
            })->values();
        }

        if ($json) {
            return $data->toJson();
        }

        return $data;
    }

    public function uploads()
    {
        foreach ($this->files as $file)  {

            $file->storeAs($this->direction, $file->getClientOriginalName(), 'uploads');
        }

        return $this->getfiles(true);
    }

    public function submit() {
        $this->validate([
           'selectedFiles' => [
               'required' , 'array' , 'min:1' , 'max:'. $this->maxItems
           ]
        ]);

        $this->dispatchBrowserEvent('prs-file-manager' , ['urls' => $this->selectedFiles , 'file_type' => (int)$this->file_type , 'model' => $this->model]);

        $this->selectedFiles = [];

        $this->dispatchBrowserEvent('close-modal');

    }

    public function sendIcons($path) {
        $this->dispatchBrowserEvent('prs-icon-manager' , ['url' => $path , 'model' => $this->model]);
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteFile($path) {
        if (File::exists($path)) {
            File::delete($path);
            $this->dispatchBrowserEvent('toast-message', ['message' => 'فایل شما پاک شد.' , 'icon' => 'success']);
        } else {
            $this->dispatchBrowserEvent('toast-message', ['message' => 'فایل شما پیدا نشد.' , 'icon' => 'danger']);
        }

        return $this->getfiles(true);
    }

    public function getData_fileManager($e)
    {
        $this->maxItems = $e['maxItems'] ?? 1;

        $this->file_type = $e['file_type'] ?? 1;

        $this->direction = $e['direction'] ?? 'photos';
        $this->type = $e['type'] ?? 'all';

//        $this->model = $e['model']) ?: $e['model'];
    }
}
