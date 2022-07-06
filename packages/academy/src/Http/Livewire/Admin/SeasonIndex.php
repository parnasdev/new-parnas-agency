<?php


namespace Packages\academy\src\Http\Livewire\Admin;


use App\Http\Extra\TableFunction;
use App\Models\Post;
use App\Models\Status;
use Livewire\Component;
use Livewire\WithPagination;
use Packages\academy\src\Models\Season;

class SeasonIndex extends Component
{
    public Post $post;
    public array $seasons = [];
    public array $deleted = [];


    public function rules()
    {
        return array(
            'seasons.*.name' => ['required' , 'string' , 'max:100'],
            'seasons.*.parent' => ['nullable'],
            'seasons.*.free' => ['nullable'],
        );
    }

    public function mount()
    {
       $this->getSeasons();
    }

    public function render()
    {
        return view('academy::livewire.admin.season-index');
    }

    public function deletedSeason($id)
    {
        $this->deleted[] = $id;
    }

    public function getSeasons()
    {
        $this->seasons = $this->post->seasons()->orderBy('id')->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'post' => $item->post_id,
                'free' => $item->free,
                'parent' => is_null($item->parent) ? 'null' : (string)$item->parent,
                'description' => $item->description,
            ];
        })->toArray();
    }

    public function submit()
    {
        $this->validate();

        foreach ($this->deleted as $item) {
            $_season = Season::query()->find($item);
            $_season->seasons()->delete();
            $_season->delete();
        }

        foreach (collect($this->seasons)->where('parent' , 'null') as $season) {
            $season['parent'] = null;
            if ($season['post'] == 0) {
                $_season = $this->post->seasons()->create($season);
            } else {
                $_season = Season::query()->find($season['id']);
                $_season->update([
                    'name' => $season['name'],
                    'parent' => $season['parent'],
                    'free' => $season['free'] ?? false,
                    'description' => $season['description'],
                ]);
            }
            foreach (collect($this->seasons)->where('parent' , $season['id']) as $subSeason) {
                $subSeason['parent'] = $_season->id;
                if ($subSeason['post'] == 0) {
                    $_subSeason = $this->post->seasons()->create($subSeason);
                } else {
                    $_subSeason = Season::query()->find($subSeason['id']);
                    $_subSeason->update([
                        'name' => $subSeason['name'],
                        'parent' => $subSeason['parent'],
                        'free' => $season['free'] ?? false,
                        'description' => $subSeason['description'],
                    ]);
                }
            }
        }
        $this->getSeasons();
        $this->dispatchBrowserEvent('toast-message' , ['message' => 'فصل های شما ذخیر و آدیت شد.' , 'icon' => 'success']);
    }
}
