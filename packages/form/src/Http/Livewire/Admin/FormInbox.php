<?php


namespace Packages\form\src\Http\Livewire\Admin;


use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Livewire\WithPagination;
use Packages\form\src\Models\Form;

class FormInbox extends \Livewire\Component
{
    use WithPagination;

    public $paginationTheme = 'parnas';

    public Form $form;

    public $index1 = 0;

    public function mount()
    {
//        $this->form->inboxes = [];
//
//        $this->form->save();
    }

    public function render()
    {
        $inboxes = $this->paginate(collect($this->form->inboxes)->sortByDesc('created_at') , 26);
        return view('form::livewire.admin.form-inbox' , compact('inboxes'));
    }

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function viewInbox($index)
    {
        $this->index1 = $index;

        $this->dispatchBrowserEvent('open-modal' , ['name' => 'view']);
    }

    public function delete($index)
    {
        $inboxes = $this->form->inboxes;

        array_splice($inboxes ,$index , 1);

        $this->form->inboxes = $inboxes;

        $this->form->save();

        $this->dispatchBrowserEvent('toast-message' , ['message' => 'کاملا حذف شد.' , 'icon' => 'success']);
    }

}
