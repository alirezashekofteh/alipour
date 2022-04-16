<?php

namespace App\Http\Controllers\payment;

use App\Http\Controllers\Controller;
use App\Models\Channel;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Wallet;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment as ShetabitPayment;

class WalletPaymentController extends Controller
{
    public function add(Request $request)
    {
     
        
                    $invoice = (new Invoice)->amount((int)$request->cost);
                    $res = auth()->user()->transactions()->create([
                        'type' => 'credit',
                        'amount' => $request->cost ,
                        'status' => '0',
                        'walletable_type' => 'online',
                        'walletable_id' => 1,
                        'description' => 'افزایش کیف پول بصورت آنلاین',
                    ]);
                    return ShetabitPayment::via('zarinpal')->callbackUrl(route('panel.chargewallet.callback'))->purchase($invoice, function ($driver, $transactionId) use ($res) {

                        $res->update([
                            'resnumber' => $transactionId,
                        ]);
                    })->pay()->render();

    }
    public function callback(Request $request)
    {
        try {
            $res = Wallet::where('resnumber', $request->Authority)->firstOrFail();
            $price = $res->amount;
            // $payment->order->price
            $receipt = ShetabitPayment::via('zarinpal')->amount($price)->transactionId($request->Authority)->verify();
            $res->update([
                'status' => 1
            ]);
            if(refcookie())
           {
            event(new \App\Events\UserReferred(refcookie(), auth()->user(),$res,$res));
           }
            alert()->success(' پرداخت شما موفقیت آمیز بود   ', 'پیغام سیستم')->persistent("تایید");
            return redirect( route('panel.chargewallet'));
        } catch (InvalidPaymentException $exception) {
            /**
             * when payment is not verified, it will throw an exception.
             * We can catch the exception to handle invalid payments.
             * getMessage method, returns a suitable message that can be used in user interface.
             **/
            alert()->error($exception->getMessage())->persistent("تایید");
        return redirect( route('panel.chargewallet'));
        }
    }
}
