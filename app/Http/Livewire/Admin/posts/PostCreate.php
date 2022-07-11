<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostFile;
use App\Models\Status;
use App\Models\Tag;
use App\Rules\ControlThumbs;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Livewire\Component;

class PostCreate extends Component
{
    public Post $post;

    public $file = [
        'url' => null,
        'alt' => null,
        'type' => null
    ];

    public array $files = [];

    protected $listeners = ['upload' , 'changeFile' , 'updateCategory' => 'render'];

    public $selectedTag = [];

    public $categoryIds = [];

    public function rules()
    {
        return [
            'post.title' => ['required' , 'string' , 'max:100'],
            'post.slug' => ['required' , 'string'  , Rule::unique('posts' , 'slug')],
            'post.description' => ['nullable' , 'string' , 'max:10000'],
            'post.body' => ['nullable' , 'string'],
            'post.pin' => ['nullable' , 'boolean'],
            'post.comment' => ['nullable' , 'boolean'],
            'post.status_id' => ['required'],
            // 'post.lang' => ['required'],
            'selectedTag' => ['nullable']
        ];
    }

    public function mount()
    {
        $this->post = new Post([
            'pin' => false,
            'comment' => false,
            // 'lang' => 'fa'
        ]);
    }

    public function render()
    {
        $categories = Category::query()->whereNull('parent_id')->where('category_type' , 1)->get();
        $statuses = Status::query()->where('type' , 1)->get();
        return view('livewire.admin.posts.post-create' , compact('categories' , 'statuses'));
    }


    public function getTags($q , $type) {
        return Tag::query()->where('name' , 'LIKE' , "%{$q}%")
            ->where('type' , $type)->get()->toJson();
    }

    public function addTags($tag)
    {
        $_tag = Tag::query()->where('name' , $tag)->first();
        if ($_tag) {
            return $_tag->toJson();
        }
        return Tag::query()->create([
            'name' => $tag,
            'type' => 1
        ])->toJson();
    }

    public function deleteFile($index)
    {
        array_splice($this->files , $index , 1);
    }

    public function editFile($index)
    {
        $this->emit('getData' , ['value' => $this->files[$index] , 'index' => $index]);
        $this->dispatchBrowserEvent('open-modal' , ['name' => 'editFileUpdate']);
    }

    public function changeFile($e)
    {
        collect($this->files)->put($e['index'] , $e['value']);
        $this->dispatchBrowserEvent('toastMessage' , ['message' => 'فایل شما آپدیت شد.' , 'icon' => 'success']);
    }

    public function openFileManager($file_type , $maxItems , $type = 'all')
    {
        $this->emit('getData_fileManager' , ['maxItems' => $maxItems , 'file_type' => $file_type , 'direction' => 'posts' , 'type' => $type]);
        $this->dispatchBrowserEvent('open-modal', ['name' => 'uploader']);
    }

    public function generateSlug()
    {
        if (!$this->post->slug) {
            $this->post->slug = SlugService::createSlug(Post::class , 'slug' , $this->post->title, ['type' => 'post']);
        } else {
            $this->post->slug = str_replace(' ' , '-' , $this->post->slug);
        }
    }

    public function submit()
    {
        $this->validate();
        $this->post->user_id = auth()->id();
        $this->post->post_type = 'post';
        $this->post->save();

        foreach ($this->files as $file) {
            PostFile::query()->create([
                'url' => $file['url'],
                'alt' => $file['alt'],
                'type' => $file['type'],
                'post_fileable_id' => $this->post->id,
                'post_fileable_type' => get_class($this->post)
            ]);
        }

        $this->post->categories()->sync($this->categoryIds ?? []);

        $this->post->tags()->sync(collect($this->selectedTag)->pluck('id') ?? []);

        session()->flash('message' , ['title' =>  'پست شما با موفقیت ثبت شد.' , 'icon' => 'success']);

        return redirect(route('admin.posts.index'));
    }
}
