<?php

namespace Packages\order\src\Http\Livewire\Home\Dashboard;

use Livewire\Component;
use Livewire\WithFileUploads;
use Packages\order\src\Models\Order;

class OrderInfo extends Component
{

    use WithFileUploads;

    public $photos;

    public Order $order;

    public function rules()
    {
        return [
            'photos.*' => ['image' , 'max:1024']
        ];
    }

    public function render()
    {
        return view('order::livewire.home.dashboard.order-info');
    }

    public function uploadFiles()
    {
        $this->validate();
        $attachments = $this->order->attechment ?? [];

        foreach ($this->photos as $photo) {
            $url = $photo->store('receipts' , 'uploads');

            $attachments[] = url('/uploads/' . $url);
        }

        $this->order->attachment = $attachments;
        $this->order->status_id = getStatus('sendResit');

        $this->order->save();

        $this->dispatchBrowserEvent('toastMessage', ['message' => 'فایل رسید شما آپلود شد.', 'icon' => 'success']);

    }



}
