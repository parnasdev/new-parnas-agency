<?php

namespace Packages\ticket\src\Http\Livewire\Home\Dashboard;

use App\Models\PostFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Packages\ticket\src\Models\Ticket;

class TicketCreatePage extends Component
{

    use WithFileUploads;

    public Ticket $ticket;

    public $file;

    public function rules()
    {
        return [
            'ticket.title' => ['required' , 'string' , 'max:100'],
            'ticket.body' => ['required' , 'string' , 'max:10000'],
            'file' => ['nullable' , 'mimes:jpg,png,mp4,pdf' , 'max:2048']
        ];
    }

    public function mount()
    {
        $this->ticket = new Ticket();
    }

    public function render()
    {
        return view('ticket::livewire.home.dashboard.ticket-create-page');
    }

    public function submit()
    {
        $this->validate();

        $this->ticket->parent_id = null;
        $this->ticket->user_id = user()->id;
        $this->ticket->status_id = getStatus('new');

        $this->ticket->save();

        if ($this->file) {

            $url = $this->file->store('tickets' , 'uploads');

            PostFile::query()->create([
                'url' => url('/uploads/' . $url),
                'type' => 1,
                'private_path' => false,
                'post_fileable_id' => $this->ticket->id,
                'post_fileable_type' => get_class($this->ticket)
            ]);
        }

        session()->flash('alert-toast' , ['icon' => 'success' , 'message' => 'تیک شمابا موفقیت ثبت شد.']);

        return redirect(route('dashboard.tickets'));
    }

}
