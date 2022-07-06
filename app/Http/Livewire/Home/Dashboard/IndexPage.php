<?php

namespace App\Http\Livewire\Home\Dashboard;

use Livewire\Component;

class IndexPage extends Component
{
    public function render()
    {
        $latestTransaction = user()->orders()->getRelation('transactions')->limit(5)->get();
        $latestCourses = user()->learnings()->with('post')->whereDate('expire' , '>' , now())->limit(6)->get();
        return view('livewire.home.dashboard.index-page' , compact('latestCourses' , 'latestTransaction'));
    }
}
