<?php


namespace Packages\form\src\Http\Livewire\Admin;


use Illuminate\Support\Str;
use Livewire\Component;
use Packages\form\src\Models\Form;

class FormEdit extends Component
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
        $this->inputs = $this->form->inputs;
    }

    public function render()
    {
        return view('form::livewire.admin.form-edit');
    }

    public function submit()
    {
        $this->validate();

        $this->form->inputs = $this->inputs;

        $this->form->save();

        return redirect(route('admin.forms.index'))->with('message' , ['title' => 'عملیات با موفقیت انجام شد.' , 'icon' => 'success']);
    }
}
