<?php

namespace App\Http\Livewire\Admin\Comments;

use App\Models\Comment;
use Livewire\Component;
use function Symfony\Component\Translation\t;

class CommentReplay extends Component
{
    public ?Comment $comment;

    public Comment $replay;

    protected $listeners = ['getData' , 'closeModal'];

    public function rules()
    {
        return [
            'replay.body' => ['required' , 'max:10000'],
        ];
    }

    public function render()
    {
        return view('livewire.admin.comments.comment-replay');
    }

    public function getData(Comment $comment)
    {
        $this->comment = $comment;
        $this->replay = new Comment();
    }

    public function submit() {
        $this->validate();
        $this->replay->parent_id = $this->comment->id;
        $this->replay->commentable_id = $this->comment->commentable_id;
        $this->replay->commentable_type = $this->comment->commentable_type;
        $this->replay->user_id = user()->id;
        $this->replay->approved = 1;

        $this->replay->save();

        $this->comment->approved = 1;

        $this->comment->save();

        $this->dispatchBrowserEvent('toastMessage' , ['message' => 'پاسخ برای این نظر ثبت شد.' , 'icon' => 'success']);

        $this->dispatchBrowserEvent('close-modal');

        $this->emit('render');

        $this->comment = null;
    }

    public function closeModal()
    {
        $this->comment = null;
    }
}
