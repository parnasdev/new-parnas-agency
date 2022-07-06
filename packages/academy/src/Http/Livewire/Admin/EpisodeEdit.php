<?php


namespace Packages\academy\src\Http\Livewire\Admin;


use App\Models\Post;
use Packages\academy\src\Models\Episode;
use Packages\academy\src\Models\Season;

class EpisodeEdit extends \Livewire\Component
{
    public Episode $episode;

    public function rules()
    {
        return [
            'episode.description' => ['nullable' , 'string' , 'max:40000']
        ];
    }

    public function render()
    {
        return view('academy::livewire.admin.episode-edit');
    }

    public function submit()
    {
        $this->validate();

        $this->episode->save();

        session()->flash('message' , ['title' =>  "توضیحات {$this->episode->name} ذخیره شد." , 'icon' => 'success']);

        $post = $this->episode->episodetable instanceof Post ? $this->episode->episodetable->id : $this->episode->episodetable->post->id;

        return redirect(route('admin.seasons.index' , ['post' => $post]));
    }
}
