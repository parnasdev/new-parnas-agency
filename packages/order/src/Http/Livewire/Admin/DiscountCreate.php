<?php

namespace Packages\order\src\Http\Livewire\Admin;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Packages\order\src\Models\Discount;

class DiscountCreate extends Component
{

    public Discount $discount;

    public function rules()
    {
        return [
            'discount.code' => ['required' , Rule::unique('discounts' , 'code')],
            'discount.is_percent' => ['nullable'],
            'discount.amount' => ['required'],
            'discount.expire_date' => ['nullable'],
            'discount.use_time' => ['nullable'],
            'discount.max_user' => ['nullable'],
        ];
    }

    public function mount()
    {
        $this->discount = new Discount([
            'is_percent' => false,
            'expire_date' => now()->format('Y/m/d H:i')
        ]);
    }

    public function render()
    {
        return view('order::livewire.admin.discount-create');
    }

    public function randomCode()
    {
        $this->discount->code = Str::random(rand(4 , 8));
    }

    public function submit()
    {
        $this->validate();

        $this->discount->amount = str_replace(',' , '' , $this->discount->amount);

        $this->discount->save();

        session()->flash('message' , ['title' =>  'تخفیف با موفقیت ثبت شد.' , 'icon' => 'success']);

        return redirect(route('admin.discounts.index'));
    }



}
