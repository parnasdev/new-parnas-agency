<?php


namespace Packages\form\src\Http\Livewire\Admin;


use Illuminate\Support\Str;
use Packages\form\src\Models\Form;

class FormCreate extends \Livewire\Component
{

    public Form $form;

    public array $inputs = [];

    public function rules()
    {
        return [
            'inputs' => 'required|array',
        ];
    }

    public function mount()
    {
        $this->form = new Form();
    }

    public function render()
    {
        return view('form::livewire.admin.form-create');
    }

    public function submit()
    {
        $this->validate();

        $this->form->name = Str::random(5);

        $this->form->inputs = $this->inputs;

        $this->form->save();

        return redirect(route('admin.forms.index'))->with('message' , ['title' => 'عملیات با موفقیت انجام شد.' , 'icon' => 'success']);
    }
}
