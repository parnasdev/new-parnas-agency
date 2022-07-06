<?php


namespace Packages\form\src\Http\Components;


class Button extends \Illuminate\View\Component
{

    /**
     * @inheritDoc
     */
    public function render()
    {
        return view('form::components.button');
    }
}
