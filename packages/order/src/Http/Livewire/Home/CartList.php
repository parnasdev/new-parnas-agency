<?php


namespace Packages\order\src\Http\Livewire\Home;

use Illuminate\Routing\Route;
use Livewire\Component;
use Packages\order\src\Http\Cart;
use Packages\order\src\Models\Discount;
use Packages\order\src\Models\Order;
use Packages\pay\src\Models\Transaction;
use Shetabit\Multipay\Exceptions\PurchaseFailedException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

class CartList extends Component
{

    public $portSelected = 'zarinpal';
    public $discountCode = '';
    public $SumBasePrice = 0;
    public $SumOfferPrice = 0;
    public $type = 'cart';

    public $discount;

    public bool $applydiscount = false;

    public function render()
    {
        $carts = Cart::all();
        return view('order::livewire.home.cart-list', compact('carts'));
    }

    public function mount()
    {

        $this->SumBasePrice = Cart::all()->pluck('post')->sum(function ($item) {
            return $item->options['price'];
        });
        $this->SumOfferPrice = Cart::all()->pluck('post')->sum(function ($item) {
            if ($item->options['offer_price'] > 0) {
                return $item->options['price'] - $item->options['offer_price'];
            }
            return 0;
        });
    }

    public function deleteItem($id)
    {
        $result = Cart::delete($id);

        if (!$result) {
            $this->dispatchBrowserEvent('toastMessage', ['message' => 'خطا در حذف', 'icon' => 'error']);
            return;
        }
        $this->render();
        $this->dispatchBrowserEvent('toastMessage', ['message' => 'عملیات با موفقبت انجام شد.', 'icon' => 'success']);

        $this->emit('updateCart');
    }

    public function pay()
    {

        if (!auth()->check()) {
            $this->dispatchBrowserEvent('toastMessage', ['message' => 'شما به سایت ورود نکرده اید', 'icon' => 'error']);
            return redirect(route('login' , ['referrer-url' => url()->current()]));
        }

        $totalPrice = $this->SumBasePrice - $this->SumOfferPrice;

        if ($this->applydiscount) {
            $totalPrice = $totalPrice - $this->getDiscountAmount();
        }

        $order = user()->orders()->create([
            'total_price' => max($totalPrice, 0),
            'discount_id' => $this->applydiscount ? $this->discount->id : null,
            'payment_type' => $this->type == 'online' ? $this->portSelected : $this->type,
            'type' => 'factor',
            'status_id' => config('order.enums.status.waitforpay')
        ]);

        if ($this->applydiscount) {
            $this->discount->users()->sync(user()->id);
            $this->discount->max_user = $this->discount->max_user - 1;
            $this->discount->save();
        }

        foreach (Cart::all() as $cart) {
            $order->details()->create([
                'post_id' => $cart['post']->id,
                'quantity' => 1,
                'price' => $cart['post']->options['price'],
                'offer_price' => $cart['post']->options['offer_price'],
                'total_price' => $cart['post']->options['offer_price'] > 0 ? $cart['post']->options['offer_price'] : $cart['post']->options['price'],
            ]);
        }

        Cart::deleteAll();
        return redirect(route('pay.purchase', ['order' => $order->id]));
    }

    public function changeType($type)
    {
        $this->type = $type;
    }

    public function applyDiscount()
    {
        if (!auth()->check()) {
            $this->dispatchBrowserEvent('toastMessage', ['message' => 'شما به سایت ورود نکرده اید', 'icon' => 'error']);
            return redirect(route('login' , ['referrer-url' => url()->current()]));
        }

        $this->discount = Discount::query()->firstWhere('code', $this->discountCode);

        if (empty($this->discount)) {
            $this->dispatchBrowserEvent('toastMessage', ['message' => 'کدتخفیف پیدا نشد', 'icon' => 'error']);
            $this->discount = null;
            return;
        }

        if (!is_null($this->discount->expire_date) && $this->discount->expire_date < now()) {
            $this->dispatchBrowserEvent('toastMessage', ['message' => 'کدتخفیف منقضی شده', 'icon' => 'error']);
            $this->discount = null;
            return;
        }

        if (!is_null($this->discount->use_time) && $this->discount->users()->where('user_id', user()->id)->count() >= $this->discount->use_time) {
            $this->dispatchBrowserEvent('toastMessage', ['message' => 'کدتخفیف استفاده شده', 'icon' => 'error']);
            $this->discount = null;
            return;
        }

        if (!is_null($this->discount->max_user) && $this->discount->max_user <= 0) {
            $this->dispatchBrowserEvent('toastMessage', ['message' => 'کدتخفیف پیدا نشد', 'icon' => 'error']);
            $this->discount = null;
            return;
        }

        $this->applydiscount = true;

        $this->dispatchBrowserEvent('toastMessage', ['message' => 'کدتخفیف اعمال شد', 'icon' => 'success']);

    }

    public function getDiscountAmount()
    {

        if (empty($this->discount)) {
            return 0;
        }

        if ($this->discount->is_percent) {
            return ($this->SumBasePrice - $this->SumOfferPrice) * $this->discount->amount / 100;
        }

        return $this->discount->amount;
    }

    public function cancelDiscount()
    {
        $this->discountCode = '';

        $this->discount = null;

        $this->applydiscount = false;
    }
}
