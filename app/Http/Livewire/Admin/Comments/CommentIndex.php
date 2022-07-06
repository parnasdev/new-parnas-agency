<?php

namespace App\Http\Livewire\Admin\Comments;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class CommentIndex extends Component
{
    use WithPagination;

    public $paginationTheme = 'bootstrap';

    public ?Post $post;

    public string $type = 'post';

    public $status = 'null';

    public $perPage = 15;

    public bool $all_comments = false;

    protected $queryString = ['perPage' => ['except' => 15] ,'type' , 'status' => ['except' => 'null']];

    protected $listeners = ['approved' , 'render' , 'delete'];

    public $readyToLoad = false;

    public function loadComments()
    {
        $this->readyToLoad = true;
    }

    public function mount(Post $post) {
        if ($post->exists) {
            $this->post = $post;
        } else {
            $this->all_comments = true;
        }
    }

    public function render()
    {
        if ($this->all_comments) {
            $comments = Comment::query()->whereHasMorph(
                'commentable',
                [Post::class],
                function ($query) {
                    $query->where('post_type' , $this->type);
                }
            );
        } else {
            $comments = $this->post->comments();
        }

        if ($this->status != 'null') {
            $comments->where('approved' , (bool)$this->status);
            if ($this->status != 0) {
                $comments->where('parent_id' , null);
            }
        } else {
            $comments->where('parent_id' , null);
        }

        $comments = $this->readyToLoad ? $comments->paginate(15) : [];
        $perPages = [15 , 30 , 45 , 50];
        return view('livewire.admin.comments.comment-index' , compact('comments' , 'perPages'));
    }

    public function approvedMessage($id) {
        $this->dispatchBrowserEvent('message' , ['message' => 'آیا میخواهید این نظر را تایید کنید؟' , 'icon' => 'warning' , 'title' => 'اطمینان دارید؟' , 'btnCText' => 'بله' , 'btnCAText' => 'لغو' , 'event' => 'approved' , 'data' => $id]);
    }

    public function approved(Comment $comment)
    {
        $comment->updateQuietly(['approved' => 1]);
        $this->dispatchBrowserEvent('toastMessage' , ['message' => 'این نظر تایید شد.' , 'icon' => 'success']);
        $this->render();
    }

    public function replay(Comment $comment)
    {
        $this->emit('getData' , $comment->id);
        $this->dispatchBrowserEvent('open-modal');

    }

    public function deleteMessage($id)
    {
        $this->dispatchBrowserEvent('deleteMessage' , ['event' => 'delete' , 'id' => $id , 'force' => true]);
    }

    public function delete(Comment $comment)
    {
        $comment->delete();

        if ($comment->parent_id == null || $comment->parent_id == 0)
            $comment->comments()->delete();

        $this->dispatchBrowserEvent('toastMessage' , ['message' => 'این نظر پاک شد.' , 'icon' => 'success']);

    }
}
