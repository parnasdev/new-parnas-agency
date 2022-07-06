<?php

namespace App\Http\Livewire\Home\Posts;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;
use Packages\multilang\src\WithMultiLang;

class InfoBlog extends Component
{
    public Post $post;

    public ?string $lang = 'fa';

    public Comment $comment;

    protected $queryString = ['lang' => ['except' => 'fa']];

    use WithMultiLang;

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

    public function mount()
    {
        $this->post->incrementVisit();

        $this->comment = new Comment();

        abort_if($this->post->status_id != getStatus('publish') , 404);

        $this->getSessionLang();

        session()->put('lang' , $this->lang);
    }

    public function render()
    {
        $comments = $this->post->comments()->whereNull('parent_id')->where('approved', 1)->paginate(20, ['*'], 'commentsPage');
        return view('livewire.home.posts.info-blog', compact('comments'));
    }

    public function submit($id = null)
    {
        $this->validate();
        $this->comment->user_id = user()->id;
        $this->comment->commentable_type = get_class($this->post);
        $this->comment->commentable_id = $this->post->id;
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

        $this->parentId = $id;
    }
}
