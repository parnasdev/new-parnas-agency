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

class ExpireOrder extends Command
{
    use InstallDefualtCheck;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expire:order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'expire order';

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
        $orders = Order::query()->where('status_id' , getStatus('waitforpay'))->get();

        foreach ($orders as $order) {
            if ($order->updated_at < Carbon::parse($order->updated_at)->addMinutes(30)) {
                $order->update([
                    'status_id' => getStatus('cancel')
                ]);
            }
        }
    }
}
