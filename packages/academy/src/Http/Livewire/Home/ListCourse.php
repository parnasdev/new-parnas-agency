<?php


namespace Packages\academy\src\Http\Livewire\Home;


use App\Http\Extra\TableFunction;
use App\Models\Category;
use App\Models\Post;
use App\Models\Status;
use App\Models\User;
use Livewire\WithPagination;
use Packages\multilang\src\WithMultiLang;

class ListCourse extends \Livewire\Component
{
    use WithPagination;

    public $perPage = 9;
    public $q = '';
    protected $paginationTheme = 'new-paginate';

    public Category|null $category = null;

    public ?string $lang = 'fa';

    protected $queryString = ['lang' => ['except' => 'fa']];

    use WithMultiLang;

    public function mount()
    {
        $this->getSessionLang();

        session()->put('lang' , $this->lang);
    }

    public function render()
    {
        if(is_null($this->category)){
            $courses = Post::query()->where('post_type', 'academy')->where('status_id', getStatus('publish'))->paginate($this->perPage);
        } else {
            $courses = $this->category->posts()->where('post_type', 'academy')->where('status_id', getStatus('publish'))->paginate($this->perPage);
        }

        return view('academy::livewire.home.list-course', compact('courses'));
    }

    public function getTeacher($teacher_id)
    {
        return User::query()->where('id', $teacher_id)->first();
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

    public function getCourseStatus($id)
    {
        return Status::query()->find($id)?->label ?? '-';
    }
}
