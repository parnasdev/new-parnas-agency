<?php


namespace Packages\academy\src\Http\Livewire\Home;


use App\Models\Post;
use Livewire\Component;
use Packages\academy\src\Models\Season;

class InfoSeasons extends Component
{
    public Post $course;
    public Season $season;

    public function mount()
    {
        abort_if($this->course->status_id != getStatus('publish') , 404);
    }

    public function render()
    {
        $subSeasons = Season::query()->where('parent', $this->season->id)->get();
        return view('academy::livewire.home.info-seasons', compact('subSeasons'));
    }
}
