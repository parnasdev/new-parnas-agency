<?php


namespace Packages\academy\src\Http\Livewire\Admin;


use App\Http\Extra\TableFunction;
use App\Models\Post;
use App\Models\PostFile;
use App\Models\Status;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Packages\academy\src\Http\VideoStream;
use Packages\academy\src\Models\Episode;
use Packages\academy\src\Models\Season;

class EpisodeIndex extends Component
{
    public Post $post;
    public array $episodes = [];
    public array $seasons = [];

    public array $deleted = [];

    protected $listeners = ['fileData'];


    public function rules()
    {
        return array(
            'episodes.*.title' => ['required' , 'string' , 'max:100'],
            'episodes.*.season' => ['nullable'],
            'episodes.*.file' => ['nullable'],
            'episodes.*.number' => ['required'],
        );
    }

    public function mount()
    {
       $this->getData();
    }

    public function render()
    {
        return view('academy::livewire.admin.episode-index');
    }

    public function deletedSeason($id)
    {
        $this->deleted[] = $id;
    }

    public function getData()
    {
        $this->episodes = $this->post->seasons()->with('episodes')
            ->getRelation('episodes')
            ->orderBy('number')->get()->map(function ($item) {
                return [
                    'id' => $item->id,
                    'number'  => $item->number,
                    'file' => $item->files()->get()->map(function ($item) {
                        return ['url' => $item->url , 'id' => $item->id];
                    })->first(),
                    'created' => true,
                    'season' => $item->episodetable instanceof Post ? 'null' : $item->episodetable_id,
                    'title' => $item->title,
                    'description' => $item->description
                ];
            })->toArray();
        $this->seasons = $this->post->seasons()->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'name'  => $item->name,
                'parent' => is_null($item->parent) ? 'null' : $item->parent,
                'description' => $item->description
            ];
        })->toArray();
    }

    public function submit()
    {
        $this->validate();
//        dd($this->episodes);
        foreach ($this->episodes as $episode) {
            if ($episode['created']) {
                $e = Episode::query()->find($episode['id']);
                $e->update([
                    'number' => $episode['number'],
                    'title' => $episode['title'],
                    'description' => $episode['description'],
                    'episodetable_id' => $episode['season'] == 'null' ? $this->post->id : $episode['season'],
                    'episodetable_type' => $episode['season'] == 'null' ? get_class($this->post) : get_class(Season::query()->find($episode['season'])),
                ]);
//                if ($episode['file']['id'] != 0) {
//                    PostFile::query()->find($episode['file']['id'])->update([
//                        'url' => $episode['file']['url'],
//                        'type' => 4,
//                        'private_path' => true,
//                    ]);
//                } else {
//                    PostFile::query()->create([
//                        'url' => $episode['file']['url'],
//                        'type' => 4,
//                        'private_path' => true,
//                        'post_fileable_id' => $e->id,
//                        'post_fileable_type' => get_class($e)
//                    ]);
//                }
                continue;
            }

            $e = Episode::query()->create([
                'number' => $episode['number'],
                'title' => $episode['title'],
                'description' => $episode['description'],
                'episodetable_id' => $episode['season'] == 'null' ? $this->post->id : $episode['season'],
                'episodetable_type' => $episode['season'] == 'null' ? get_class($this->post) : get_class(Season::query()->find($episode['season'])),
            ]);

//            PostFile::query()->create([
//                'url' => $episode['file']['url'],
//                'type' => 4,
//                'private_path' => true,
//                'post_fileable_id' => $e->id,
//                'post_fileable_type' => get_class($e)
//            ]);
        }

        $this->getData();
        $this->dispatchBrowserEvent('toast-message' , ['message' => 'ویدیو های شما ذخیر و آدیت شد.' , 'icon' => 'success']);
    }


    public function fileData($e)
    {
        $index = collect($this->episodes)->search(function ($item) use ($e) {
            return $item['id'] == $e['id'];
        });

        if ($index !== false) {
            $this->episodes[$index]['file'] = $e['file'];
        }
    }
}
