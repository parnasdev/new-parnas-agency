<?php

namespace Packages\academy\src\Http\Livewire\Home;

use App\Models\Post;
use App\Models\User;
use Livewire\WithPagination;

class TeacherShow extends \Livewire\Component
{
    use WithPagination;

    public $paginationTheme = 'new-paginate';

    public Post $post;

    public function render()
    {
        $courses = Post::query()->where('options->teacher' , $this->post->options['teacher_id'])->where('status_id' , getStatus('publish'))->where('post_type' , 'academy')->paginate(9);
        return view('academy::livewire.home.teacher-show' , compact('courses'));
    }

    public function teacherImg()
    {
        return User::query()->findOrFail($this->post->options['teacher_id'])
            ->files?->firstWhere('type' , 1);
    }

}
