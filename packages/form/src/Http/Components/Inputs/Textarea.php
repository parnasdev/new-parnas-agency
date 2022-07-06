<?php


namespace Packages\form\src\Http\Components\Inputs;


class Textarea extends \Illuminate\View\Component
{

    /**
     * @inheritDoc
     */
    public function render()
    {
        return view('form::components.inputs.textarea');
    }
}
