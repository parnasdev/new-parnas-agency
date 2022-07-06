<?php


namespace Packages\order\src\Http\Livewire\Admin;


use App\Models\Status;
use Packages\academy\src\Events\AddLearning;
use Packages\order\src\Models\Order;

class OrderShow extends \Livewire\Component
{

    public Order $order;

    public function rules()
    {
        return [
            'order.status_id' => 'required'
        ];
    }

    public function render()
    {
        $statuses = Status::query()->whereIn('id' , array_values(config('order.enums.status')))->get();
        return view('order::livewire.admin.order-show' , compact('statuses'));
    }

    public function submit()
    {
        $this->validate();

        $this->order->save();

        if ($this->order->status_id == config('order.enums.status.complete')) {
            event(new AddLearning($this->order));
        }
        $this->dispatchBrowserEvent('toast-message' , ['message' => 'سفارش با موفقیت تغییر']);
    }
}
