<?php


namespace Packages\pay\src\Http\Controllers;


use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOTools;
use Packages\academy\src\Events\AddLearning;
use Packages\order\src\Models\Order;
use Packages\pay\src\Models\Transaction;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Exceptions\PurchaseFailedException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

class PaymentController extends Controller
{

    public function callbackurl(Order $order)
    {
        $message = null;
        if ($order->status_id != config('order.enums.status.complete')) {
            try {
                $receipt = Payment::amount($order->total_price)->transactionId(request('Authority'))->verify();
                $transaction = Transaction::query()->where('resnumber', request('Authority'))->first();
                $transaction->update([
                    'exit_port_at' => now(),
                    'details' => [
                        'referenceId' => $receipt->getReferenceId()
                    ],
                    'status_id' => config('pay.enums.status.successful'),
                ]);
                $order->update([
                    'status_id' => config('order.enums.status.complete')
                ]);

                event(new AddLearning($order));

            } catch (InvalidPaymentException $exception) {
                $message = $exception->getMessage();
                $transaction = Transaction::query()->where('resnumber', request('Authority'))->first();
                $transaction->update([
                    'exit_port_at' => now(),
                    'status_id' => config('pay.enums.status.unsuccessful'),
                ]);
            }
        } else {
            $transaction = Transaction::query()->where('resnumber', request('Authority'))->first();
        }
        SEOTools::metatags()->addMeta('robots' , 'noindex');
        return view('pay::home.verify', compact('transaction', 'order' , 'message'));
    }

    public function purchase(Order $order)
    {
        if ($order->payment_type == 'cart') {
            return redirect(route('dashboard.orders.show' , ['order' => $order->id]));
        }

        if ($order->status_id != config('order.enums.status.waitforpay')) {
            return redirect('/');
        }

        if ($order->total_price == 0) {
            $order->update([
                'status_id' => config('order.enums.status.complete')
            ]);
            return redirect(route('dashboard.orders.show' , ['order' => $order->id]));
        }

        $invoice = new Invoice();

        $invoice->amount($order->total_price);
        $payment = Payment::via($order->payment_type)->callbackUrl(route('pay.verify', ['order' => $order->id]));
        try {
            $payment->purchase(
                $invoice,
                function ($driver, $transactionId) use ($order) {
                    Transaction::query()->create([
                        'user_id' => $order->user_id,
                         'amount' => $order->total_price,
                        'resnumber' => $transactionId,
                        'enter_port_at' => now(),
                        'status_id' => config('order.enums.status.waitforpay'),
                        'transactiontable_type' => get_class($order),
                        'transactiontable_id' => $order->id
                    ]);
                }
            );
        } catch (PurchaseFailedException $exception) {
            $message = $exception->getMessage();
            return redirect('/');
        }

        return $payment->pay()->render();
    }

}
