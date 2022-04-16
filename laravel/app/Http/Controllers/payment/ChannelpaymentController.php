<?php

namespace App\Http\Controllers\payment;

use App\Http\Controllers\Controller;
use App\Models\Channel;
use App\Models\MembertimeChannel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Wallet;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment as ShetabitPayment;

class ChannelpaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function purchase(MembertimeChannel $member)
    {
        if (auth()->check()) {
            if (!auth()->user()->Channels()->where('channel_id', $member->channel->id)->where('expire_at', '>', Carbon::now())->count()) {
                if (auth()->user()->allowWithdraw($member->cost)) {
                    $res = auth()->user()->transactions()->create([
                        'type' => 'debit',
                        'amount' => $member->cost,
                        'status' => '1',
                        'walletable_type' => get_class($member),
                        'walletable_id' => $member->id,
                        'description' => 'channel-wallet',
                    ]);
                    auth()->user()->channels()->attach(
                        $res->walletable->channel->id,
                        [
                            'member' => $res->walletable->id,
                            'day' => $res->walletable->days,
                            'expire_at' => Carbon::now()->addDays($res->walletable->days),
                            'created_at' => Carbon::now(),
                            'wallet_id' => $res->id,
                            'description' => 'channel-wallet',
                        ]
                    );
                    alert()->success(' پرداخت شما موفقیت آمیز بود   ', 'پیغام سیستم')->persistent("تایید");
                    return redirect(route('panel.channel', $member->slug));
                } else {

                    $invoice = (new Invoice)->amount($member->cost - auth()->user()->balance());
                    $res = auth()->user()->transactions()->create([
                        'type' => 'credit',
                        'amount' => $member->cost - auth()->user()->balance(),
                        'status' => '0',
                        'walletable_type' => get_class($member),
                        'walletable_id' => $member->id,
                        'description' => ' بابت خرید کانال '.$member->channel->name,
                    ]);

                    return ShetabitPayment::callbackUrl(route('panel.channel.callback'))->purchase($invoice, function ($driver, $transactionId) use ($member, $invoice, $res) {

                        $res->update([
                            'resnumber' => $transactionId,
                        ]);
                    })->pay()->render();
                }
            } else {
                alert()->success(' شما قبلا در این دوره ثبت نام کرده اید ', 'پیغام سیستم')->persistent("تایید");
                return redirect(route('panel.channel', $member->slug));
            }
        } else {
            session()->put('route', 'channel.purchase');
            session()->put('value',$member->id);
            session()->put('dataurl',url()->previous());
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
                'description' => 'channel-online',
                'parent' => $res->id,
            ]);
            auth()->user()->channels()->attach(
                $res->walletable->channel->id,
                [
                    'member' => $res->walletable->id,
                    'day' => $res->walletable->days,
                    'expire_at' => Carbon::now()->addDays($res->walletable->days),
                    'created_at' => Carbon::now(),
                    'wallet_id' => $result->id,
                    'description' => 'channel-online',
                ]
            );
            event(new \App\Events\UserReferred(refcookie(), auth()->user(),$res->walletable,$res));
            alert()->success(' پرداخت شما موفقیت آمیز بود   ', 'پیغام سیستم')->persistent("تایید");
            session()->forget('dataurl');
            return redirect(route('panel.channel'));
        } catch (InvalidPaymentException $exception) {
            /**
             * when payment is not verified, it will throw an exception.
             * We can catch the exception to handle invalid payments.
             * getMessage method, returns a suitable message that can be used in user interface.
             **/
            alert()->error($exception->getMessage())->persistent("تایید");
            return redirect(route('panel.index'));
        }
    }
}
