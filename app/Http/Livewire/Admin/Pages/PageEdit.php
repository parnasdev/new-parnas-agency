<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Post;
use App\Models\PostFile;
use App\Models\Status;
use App\Rules\ControlThumbs;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Livewire\Component;
use function Symfony\Component\Translation\t;

class PageEdit extends Component
{

    public Post $post;

    public $file = [
        'url' => null,
        'alt' => null,
        'type' => null
    ];

    public Collection $files;

    protected $listeners = ['upload' , 'changeFile' , 'getBody'];

    public $selectedTag = [];

    public $categoryIds = [];

    public $deletedFiles = [];

    public $pageType;

    public function rules()
    {
        return [
            'post.title' => ['required', 'string', 'max:100'],
            'post.slug' => ['required', 'string', Rule::unique('posts', 'slug')->where('post_type', 'page')],
            'post.pin' => ['nullable', 'boolean'],
            'post.comment' => ['nullable', 'boolean'],
            'post.status_id' => ['required'],
            'post.options.master' => ['required'],

            // about page
            'post.options.about_page' => ['nullable'],
            'post.options.quote' => ['nullable'],
            'post.options.about_body' => ['nullable'],
            'post.options.subtitle' => ['nullable'],

            // contact page
            'post.options.contact_page' => ['nullable'],
            'post.options.form_code' => ['nullable'],
            'post.options.contact_info' => ['nullable'],
            'post.options.map_frame' => ['nullable'],

        ];
    }

    public function mount()
    {
        $this->files = collect($this->post->files()->get()->toArray());

        if($this->post->options['about_page'] ?? false) {
            $this->pageType = 'about_page';
        } elseif($this->post->options['contact_page'] ?? false) {
            $this->pageType = 'contact_page';
        }
    }

    public function render()
    {
        $statuses = Status::query()->where('type' , 1)->get();
        return view('livewire.admin.pages.page-edit' , compact('statuses'));
    }
    public function upload()
    {
        $this->validate([
            'file.url' => ['required'],
            'file.alt' => ['nullable' , 'string' , 'max:100'],
            'file.type' => ['required' , new ControlThumbs($this->files , 1)],
        ]);

        $this->files->push([
            'id' => null,
            'url' => $this->file['url'],
            'type' => $this->file['type'],
            'alt' => $this->file['alt']
        ]);

        $this->resetForm();
    }

    public function resetForm()
    {
        $this->file = [
            'url' => null,
            'alt' => null,
            'type' => null
        ];
    }

    public function deleteFile($index)
    {
        if ($this->files[$index]['id'] != null) {
            $this->deletedFiles = $this->files[$index]['id'];
        }
        $this->files->splice($index , 1);
    }

    public function editFile($index)
    {
        $this->emit('getData' , ['value' => $this->files[$index] , 'index' => $index]);
        $this->dispatchBrowserEvent('open-modal' , ['name' => 'file-edit']);
    }

    public function changeFile($e)
    {
        $this->files->put($e['index'] , $e['value']);
        $this->dispatchBrowserEvent('toastMessage' , ['message' => 'فایل شما آپدیت شد.' , 'icon' => 'success']);
    }

    public function generateSlug()
    {
        if (!$this->post->slug) {
            $this->post->slug = SlugService::createSlug(Post::class , 'slug' , $this->post->title , ['type' => 'page']);
        } else {
            $this->post->slug = str_replace(' ' , '-' , $this->post->slug);
        }
    }

    public function submit()
    {
        $this->validate();

        $this->post->options = match($this->pageType) {
            "about_page" => array_merge($this->post->options , ['about_page' => true , 'contact_page' => false]),
            "contact_page" => array_merge($this->post->options , ['about_page' => false , 'contact_page' => true]),
            default =>  array_merge($this->post->options , ['about_page' => false , 'contact_page' => false])
        };

        $this->post->post_type = 'page';
        $this->post->save();

        if (count($this->deletedFiles) > 0) {
            PostFile::query()->whereIn('id' , $this->deletedFiles)->delete();
        }

        foreach ($this->files->whereNull('id') as $file) {
            PostFile::query()->create([
                'url' => $file['url'],
                'alt' => $file['alt'],
                'type' => $file['type'],
                'post_fileable_id' => $this->post->id,
                'post_fileable_type' => get_class($this->post)
            ]);
        }

        foreach ($this->files->whereNotNull('id') as $file) {
            PostFile::query()->find($file['id'])->update([
                'url' => $file['url'],
                'alt' => $file['alt'],
                'type' => $file['type'],
            ]);
        }

        session()->flash('message' , ['title' =>  'صفحه شما با موفقیت ثبت شد.' , 'icon' => 'success']);

        return redirect(route('admin.pages.index'));
    }

    public function getBody($e)
    {
        $this->post->options = $e;
    }
}
