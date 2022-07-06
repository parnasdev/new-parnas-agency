<?php


namespace Packages\form\src\Http\Components\Inputs;


class Text extends \Illuminate\View\Component
{

    /**
     * @inheritDoc
     */
    public function render()
    {
        return view('form::components.inputs.text');
    }
}
