<?php


namespace Packages\academy\src\Http\Livewire\Admin;


use App\Models\Post;
use Packages\academy\src\Models\Season;

class SeasonEdit extends \Livewire\Component
{
    public Season $season;


    public function rules()
    {
        return [
          'season.description' => ['nullable' , 'string' , 'max:40000']
        ];
    }

    public function render()
    {
        return view('academy::livewire.admin.season-edit');
    }

    public function submit()
    {
        $this->validate();

        $this->season->save();

        session()->flash('message' , ['title' =>  "توضیحات {$this->season->name} ذخیره شد." , 'icon' => 'success']);

        return redirect(route('admin.seasons.index' , ['post' => $this->season->post_id]));
    }
}
