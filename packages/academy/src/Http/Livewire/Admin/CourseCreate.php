<?php


namespace Packages\academy\src\Http\Livewire\Admin;


use App\Http\Extra\TableFunction;
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
use Livewire\WithPagination;
use Packages\academy\src\Models\Episode;
use Packages\academy\src\Rules\MinMaxPrice;

class CourseCreate extends Component
{
    public Post $post;

    public array $seasons = [];

    public array $episodes = [];

    public $file = [
        'url' => null,
        'alt' => null,
        'type' => null
    ];

    public array $files = [];

    public array $faq = [];

    protected $listeners = ['upload' , 'changeFile' , 'updateCategory' => 'render'];

    public array $selectedTag = [];

    public array $categoryIds = [];

    public function rules()
    {
        return [
            'post.title' => ['required' , 'string' , 'max:100'],
            'post.slug' => ['required' , 'string'  , Rule::unique('posts' , 'slug')->where('post_type' , 'academy')],
            'post.description' => ['nullable' , 'string' , 'max:10000'],
            'post.body' => ['nullable' , 'string'],
            'post.pin' => ['nullable' , 'boolean'],
            'post.comment' => ['nullable' , 'boolean'],
            'post.options.course_status' => ['required'],
            'post.options.price' => ['required'],
            'post.options.course_type' => ['required'],
            'post.options.course_id' => [Rule::when($this->post->options['course_type'] == 'spot' , ['required'] , ['nullable'])],
            'post.options.spot_player' => ['nullable'],
            'post.options.offer_price' => ['nullable' , new MinMaxPrice('min' , $this->post->options['price'])],
            'post.options.start_offer_day' => ['nullable' , 'min:0' , 'max:100'],
            'post.options.manage_offer' => ['nullable'],
            'post.options.end_offer_day' => ['nullable' , 'min:1' , 'max:100'],
            'post.options.teacher' => ['nullable'],
            'post.options.course_period' => ['nullable'],
            'post.options.courses' => ['nullable'],
            'post.options.posts' => ['nullable'],
            'post.options.waranty.title' => ['nullable'],
            'post.options.waranty.subtitle' => ['nullable'],
            'post.status_id' => ['required'],
        ];
    }

    public function mount()
    {
        $this->post = new Post([
            'pin' => false,
            'comment' => false,
            'options' => [
                'price' => 0,
                'offer_price' => 0,
                'manage_offer' => false,
                'start_offer_day' => 0,
                'end_offer_day' => 1,
                'start_offer_date' => null,
                'end_offer_date' => null,
                'course_status' => null,
                'course_type' => 'online',
                'teacher' => null,
                'course_period' => '',
                'title' => '',
                'slug' => '',
                'courses' => [],
                'posts' => [],
                'course_id' => null
            ]
        ]);

//        $this->files = collect([]);
    }

    public function render()
    {
        $categories = Category::query()->where('parent_id' , null)->where('category_type' , 2)->get();

        $statuses = Status::query()->where('type' , 1)->get();
        $cStatuses = Status::query()->where('type' , 2)->get();

        return view('academy::livewire.admin.course-create' , compact('statuses' , 'cStatuses' , 'categories'));
    }

    public function getTags($q , $type) {
        return Tag::query()->where('name' , 'LIKE' , "%{$q}%")
            ->where('type' , $type)->get()->toJson();
    }

    public function addTags($tag , $type)
    {
        $_tag = Tag::query()->where('name' , $tag)->where('type' , $type)->first();
        if ($_tag) {
            return $_tag->toJson();
        }
        return Tag::query()->create([
            'name' => $tag,
            'type' => $type
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

    public function openFileManager($file_type , $maxItems , $type)
    {
        $this->emit('getData_fileManager' , ['maxItems' => $maxItems , 'file_type' => $file_type , 'direction' => 'posts' , 'type' => $type]);
        $this->dispatchBrowserEvent('open-modal', ['name' => 'uploader']);
    }


    public function changeFile($e)
    {
        collect($this->files)->put($e['index'] , $e['value']);
        $this->dispatchBrowserEvent('toastMessage' , ['message' => 'فایل شما آپدیت شد.' , 'icon' => 'success']);
    }

    public function generateSlug()
    {
        if (!$this->post->slug) {
            $this->post->slug = SlugService::createSlug(Post::class , 'slug' , $this->post->title, ['type' => 'academy']);
        } else {
            $this->post->slug = str_replace(' ' , '-' , $this->post->slug);
        }
    }

    public function submit()
    {
        $price = str_replace(',' , '' , $this->post->options['price'] ?? 0);
        $offer_price = str_replace(',' , '' , $this->post->options['offer_price'] ?? 0);

        $this->validate();

        $this->post->options = array_merge($this->post->options , ['price' => $price , 'offer_price' => $offer_price]);

        if ($this->post->options['manage_offer']) {
            $this->post->options = array_merge($this->post->options , ['start_offer_date' => $this->post->options['start_offer_day'] > 0 ? now()->addDays($this->post->options['start_offer_day']) : now() , 'end_offer_date' => $this->post->options['end_offer_day'] > 0 ? now()->addDays($this->post->options['end_offer_day']) : now()]);
        }

        $this->post->options = array_merge($this->post->options , ['faq' => $this->faq]);

        $this->post->user_id = auth()->id();
        $this->post->post_type = 'academy';

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

        session()->flash('message' , ['title' =>  'دوره شما با موفقیت ثبت شد.' , 'icon' => 'success']);

        return redirect(route('admin.courses.index'));
    }
}
