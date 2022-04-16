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

class VippaymentController extends Controller
{
    public function purchase(Subscription $subscription)
    {
        if (auth()->check()) {
            if(auth()->user()->expire_at < Carbon::now())
            {
                if (auth()->user()->allowWithdraw($subscription->cost)) {
                    $res = auth()->user()->transactions()->create([
                        'type' => 'debit',
                        'amount' => $subscription->cost,
                        'status' => '1',
                        'walletable_type' => get_class($subscription),
                        'walletable_id' => $subscription->id,
                        'description' => 'wallet',
                    ]);
                    auth()->user()->update([
                        'expire_at' => Carbon::now()->addDays($res->walletable->time)
                    ]);
                    alert()->success(' پرداخت شما موفقیت آمیز بود   ', 'پیغام سیستم')->persistent("تایید");
                    return redirect(session()->get('dataurl'));
                } else {

                    $invoice = (new Invoice)->amount($subscription->cost - auth()->user()->balance());
                    $res = auth()->user()->transactions()->create([
                        'type' => 'credit',
                        'amount' => $subscription->cost - auth()->user()->balance(),
                        'status' => '0',
                        'walletable_type' => get_class($subscription),
                        'walletable_id' => $subscription->id,
                        'description' => 'online',
                    ]);
                    return ShetabitPayment::callbackUrl(route('vip.callback'))->purchase($invoice, function ($driver, $transactionId) use ($subscription, $invoice, $res) {

                        $res->update([
                            'resnumber' => $transactionId,
                        ]);
                    })->pay()->render();
                }

        }
        else
        {
            alert()->success(' شما عضو ویژه هستید   ', 'پیغام سیستم')->persistent("تایید");
            return redirect()->back();
        }
     }
      else {
            session()->put('route', 'vip.purchase');
            session()->put('value',$subscription->id);
            session()->put('type', 'purchase');
            return redirect(route('register'));
        }
    }
    public function callback(Request $request)
    {
        try {
            $res = Wallet::where('resnumber', $request->Authority)->firstOrFail();
            $price = $res->amount;
            // $payment->order->price
            $receipt = ShetabitPayment::amount($price)->transactionId($request->Authority)->verify();
            $res->update([
                'status' => 1
            ]);
            $result = auth()->user()->transactions()->create([
                'type' => 'debit',
                'amount' => $res->walletable->cost,
                'status' => '1',
                'walletable_type' => $res->walletable_type,
                'walletable_id' => $res->walletable->id,
                'description' => 'wallet',
                'parent' => $res->id,
            ]);
            auth()->user()->update([
                'expire_at' => Carbon::now()->addDays($res->walletable->time)
            ]);
            alert()->success(' پرداخت شما موفقیت آمیز بود   ', 'پیغام سیستم')->persistent("تایید");
            return redirect(session()->get('dataurl'));
        } catch (InvalidPaymentException $exception) {
            /**
             * when payment is not verified, it will throw an exception.
             * We can catch the exception to handle invalid payments.
             * getMessage method, returns a suitable message that can be used in user interface.
             **/
            alert()->error($exception->getMessage())->persistent("تایید");
            return redirect(session()->get('dataurl'));
        }
    }
}
