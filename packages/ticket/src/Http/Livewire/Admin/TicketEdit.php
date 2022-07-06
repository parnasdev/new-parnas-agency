<?php


namespace Packages\ticket\src\Http\Livewire\Admin;


use App\Models\PostFile;
use Illuminate\Support\Facades\Storage;
use Packages\ticket\src\Models\Ticket;

class TicketEdit extends \Livewire\Component
{
    public Ticket $ticket;

    public Ticket $replay;

    public array $file = [
        'url' => ''
    ];
    public array $files = [];


    public function rules()
    {
        return [
            'replay.body' => ['required' , 'string' , 'max:10000'],
        ];
    }

    public function mount()
    {
        $this->replay = new Ticket();
    }

    public function render()
    {
        return view('ticket::livewire.admin.ticket-edit');
    }

    public function submit()
    {
        $this->validate();

        $this->replay->user_id = user()->id;

        $this->replay->parent_id = $this->ticket->id;

        $this->ticket->status_id = getStatus('admin_answer');

        $this->replay->save();

        $this->ticket->save();

        if ($this->file["url"] != '') {

            PostFile::query()->create([
                'url' => $this->file['url'],
                'type' => 1,
                'private_path' => false,
                'post_fileable_id' => $this->replay->id,
                'post_fileable_type' => get_class($this->replay)
            ]);
        }

        $this->replay = new Ticket();

        $this->dispatchBrowserEvent('toast-message' , ['message' => 'پاسخ ثبت شد.']);
    }

    public function openFileManager($file_type , $maxItems , $type = 'all')
    {
        $this->emit('getData_fileManager' , ['maxItems' => $maxItems , 'file_type' => $file_type , 'direction' => 'tickets' , 'type' => $type]);
        $this->dispatchBrowserEvent('open-modal', ['name' => 'uploader']);
    }

    public function deleteFile()
    {
        $this->file = [
            'url' => ''
        ];
    }

}
