<?php

namespace Packages\ticket\src\Http\Livewire\Home\Dashboard;

use App\Models\PostFile;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Packages\ticket\src\Models\Ticket;

class TicketShowPage extends \Livewire\Component
{
    use WithFileUploads;

    public Ticket $ticket;

    public Ticket $replay;

    public $file;

    public function rules()
    {
        return [
            'replay.body' => ['required' , 'string' , 'max:10000'],
            'file' => ['nullable' , 'mimes:jpg,png,mp4,pdf' , 'max:2048']
        ];
    }

    public function mount()
    {
        $this->replay = new Ticket();
    }

    public function render()
    {
        return view('ticket::livewire.home.dashboard.ticket-show-page');
    }

    public function submit()
    {
        $this->validate();

        $this->replay->parent_id = $this->ticket->id;
        $this->replay->user_id = user()->id;
        $this->ticket->status_id = getStatus('user_answer');

        $this->replay->save();

        $this->ticket->save();

        if ($this->file) {

            $url = $this->file->store('tickets' , 'uploads');

            PostFile::query()->create([
                'url' => url('/uploads/' . $url),
                'type' => 1,
                'private_path' => false,
                'post_fileable_id' => $this->replay->id,
                'post_fileable_type' => get_class($this->replay)
            ]);
        }

        $this->dispatchBrowserEvent('toast' , ['message' => 'پاسخ شما ثبت شد.' , 'icon' => 'success']);

        $this->render();
    }
}
