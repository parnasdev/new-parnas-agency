<?php


namespace Packages\academy\src\Http\Livewire\Home\Dashboard;


class CoursesPage extends \Livewire\Component
{

    public function render()
    {
        $courses = user()->learnings()->latest()->where('expire' , '>=' , now())->with('post')->paginate(12);
        return view('academy::livewire.home.dashboard.courses-page' , compact('courses'));
    }
}
