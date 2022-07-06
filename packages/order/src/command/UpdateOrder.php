<?php

namespace Packages\order\src\command;

use App\Console\InstallDefualtCheck;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Setting;
use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Packages\order\src\Models\Order;

class UpdateOrder extends Command
{
    use InstallDefualtCheck;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update order';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $orders = Order::query()->where('status_id', getStatus('waitforpay'))->get();

        foreach ($orders as $order) {
            $newTotal = 0;
            foreach ($order->details()->get() as $item) {
                $item->update([
                    'price' => $item->post->options['price'],
                    'special_price' => $item->post->options['offer_price'],
                    'total_price' => $item->post->options['offer_price'] > 0 ? $item->post->options['offer_price'] * $item->quantity : $item->post->options['price'] * $item->quantity,
                ]);
                $newTotal += $item->total_price;
            }
            if ($order->discount_id)
                $newTotal = $newTotal - $this->getDiscountAmount($newTotal , $order);

            if ($newTotal != $order->total_price) {
                // sent sms for user

                $order->update([
                    'total_price' => $newTotal
                ]);
            }
        }
    }

    public function getDiscountAmount($total,$order)
    {


        if ($order->discount->is_percent) {
            return $total * $order->discount->amount / 100;
        }

        return $order->discount->amount;
    }
}
