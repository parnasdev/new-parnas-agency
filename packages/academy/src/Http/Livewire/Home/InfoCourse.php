<?php


namespace Packages\academy\src\Http\Livewire\Home;


use App\Models\Comment;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Artesaos\SEOTools\Facades\SEOTools;
use Livewire\Component;
use Livewire\WithPagination;
use Packages\academy\src\Models\Learning;
use Packages\multilang\src\WithMultiLang;
use Packages\order\src\Http\Cart;

class InfoCourse extends Component
{
    use WithPagination;

    public Post $course;
    public Comment $comment;

    public $parentId = null;

    public function rules()
    {
        return [
            'comment.name' => ['required' , 'string' , 'max:50'],
            'comment.email' => ['required' , 'email'],
            'comment.body' => 'required',
            'comment.rate' => 'required'
        ];
    }

    protected $paginationTheme = 'new-paginate';

    public ?string $lang = 'fa';

    protected $queryString = ['lang' => ['except' => 'fa']];

    use WithMultiLang;


    public function mount()
    {
        $this->course->incrementVisit();
        SEOTools::setTitle($this->course->title);
        SEOTools::setCanonical($this->course->path());
        SEOTools::setDescription($this->course->description);
        $this->comment = new Comment();
        abort_if($this->course->status_id != getStatus('publish'), 404);
        $this->getSessionLang();

        session()->put('lang' , $this->lang);
    }

    public function render()
    {
        $similarPosts = Post::query()->whereIn('id', $this->course->options['posts'] ?? [])->get();
        $similarCourses = Post::query()->whereIn('id', $this->course->options['courses'] ?? [])->get();

        $learning = user()?->learnings()->latest()
            ->where('expire' , '>=' , now())
            ->where('post_id', $this->course->id)->first();

        $comments = $this->course->comments()->whereNull('parent_id')->where('approved', 1)->paginate(20, ['*'], 'commentsPage');
        $teacher = $this->getTeacher();
        return view('academy::livewire.home.info-course', compact('learning', 'similarCourses', 'similarPosts', 'comments' , 'teacher'));
    }

    public function getTeacher(Post $post = null)
    {
        if (is_null($post))
            return Post::query()->where('post_type' , 'page')->where('options->teacher_page' , true)->where('options->teacher_id' , $this->course->options['teacher'])->first();
        else
            return Post::query()->where('post_type' , 'page')->where('options->teacher_page' , true)->where('options->teacher_id' , $post->options['teacher'])->first();
    }

    public function teacherImg()
    {
        return User::query()->findOrFail($this->course->options['teacher'])
            ->files?->firstWhere('type' , 1);
    }

    public function checkCourseType($type): string
    {
        if ($type == 'online') {
            return 'آنلاین';
        } else if ($type == 'spotplayer') {
            return 'آنلاین spotPlayer';
        } else {
            return 'حضوری';
        }
    }

    public function checkDiscountPercent($price, $discount): int
    {
        $discount = ($discount * 100) / $price;
        return round(100 - $discount);
    }

    public function addToCart()
    {
        $inCart = Cart::has($this->course);

        if (!$inCart) {
            Cart::put([], $this->course);
            $this->dispatchBrowserEvent('toastMessage', ['message' => 'به سبد خرید اضافه شد', 'icon' => 'success']);
        } else {
            $this->dispatchBrowserEvent('toastMessage', ['message' => 'این دوره در سبد خرید اضافه شده است', 'icon' => 'warning']);
        }

        $this->emit('updateCart');
        return redirect(route('cart'));
    }

    public function submit($id = null)
    {
        $this->validate();
        $this->comment->user_id = user()->id;
        $this->comment->commentable_type = get_class($this->course);
        $this->comment->commentable_id = $this->course->id;
        $this->comment->parent_id = $id;
        $this->comment->approved = 0;
        $this->comment->save();
        $this->comment = new Comment();
        $this->dispatchBrowserEvent('close-comment');
        $this->dispatchBrowserEvent('toastMessage', ['message' => 'نظر شما ثبت شد. منتظر تایید ادمین باشید', 'icon' => 'success']);
    }

    public function showLoginMessage($id = null)
    {
        if (!auth()->check())
            $this->dispatchBrowserEvent('toastMessage', ['message' => 'لطفا برای ارسال نظر وارد شوید', 'icon' => 'warning']);
    }
}
