<?php

namespace App\Http\Controllers\payment;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Wallet;
use App\Notifications\SendAgentInstallment;
use App\Notifications\SendRefSuccess;
use App\Notifications\SendTermSuccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment as ShetabitPayment;

class WalletDirectController extends Controller
{
    public function wallets(Wallet $wallet)
    {
        $checkgest = Wallet::where('user_id', $wallet->user_id)->where('walletable_type', $wallet->walletable_type)->where('walletable_id', $wallet->walletable_id)->where('installments', $wallet->installments - 1)->where('status', 0)->count();

        if ($checkgest and $wallet->installments > 1) {
            alert()->error(' قسط قبلی مربوط به این دوره پرداخت نشده است      ', ' پیغام سیستم  ')->persistent("تایید");
            return back();
        }
        if ($wallet->user->allowWithdraw($wallet->amount)) {
             $res = $wallet->user->transactions()->create([
                'type' => 'debit',
                 'amount' => $wallet->amount,
                'status' => '1',
                 'walletable_type' => get_class($wallet->walletable),
                 'walletable_id' => $wallet->walletable->id,
                 'description' => ' خرید قسط اول دوره ' . $wallet->walletable->name,
                 'parent' => $wallet->id,
                 'agent'=>refcookie()
             ]);
            $res2 = $wallet->user->transactions()->create([
                'type' => 'debit',
                'amount' => $wallet->amount,
                'status' => '1',
                'walletable_type' => get_class($wallet->walletable),
                'walletable_id' => $wallet->walletable->id,
                'description' => ' کسر از کیف پول بابت قسط دوره ' . $wallet->walletable->name,
                'parent' => $wallet->id,
                'agent'=>refcookie()
            ]);

            $term = $wallet->walletable;
            $neworder = Order::updateOrCreate([
                'user_id' => $wallet->user_id,
                'term_id' => $term->id,
                'status' => 1,
            ], [
                'price' => $term->priceins($res->user),
                'resnumber' => $res->id,
                'description' => 'installments',
                'installments' => $wallet->installments,
                'agent' => $wallet->agent,
                'expire_support' => now()->addDays($term->sup_day / 2),
                'agent'=>refcookie()

            ]);
            $wallet->update([
                'status' => 1,
            ]);
            if($wallet->installments==1)
            {
            event(new \App\Events\TermChannel($term, auth()->user(), $wallet));
            }
            $wallet->user->notify(new SendTermSuccess($term));
            $wallet->agents->notify(new SendAgentInstallment($wallet));
            alert()->success(' پرداخت شما موفقیت آمیز بود   ', 'پیغام سیستم')->persistent("تایید");
            return redirect(route('index'));
        } else {
            $wallet->update([
                'amount' => $wallet->amount - $wallet->user->balance(),
            ]);
            if ($wallet->user->balance() > 0) {
                $res = $wallet->user->transactions()->create([
                    'type' => 'debit',
                    'amount' => $wallet->user->balance(),
                    'status' => '1',
                    'walletable_type' => get_class($wallet->walletable),
                    'walletable_id' => $wallet->walletable->id,
                    'description' => ' کسر از کیف پول بابت قسط دوره ' . $wallet->walletable->name,
                    'parent' => $wallet->id,
                ]);
            }
            $invoice = (new Invoice)->amount((int) $wallet->amount);
            return ShetabitPayment::callbackUrl(route('walletdirect.callback'))->purchase($invoice, function ($driver, $transactionId) use ($wallet) {

                $wallet->update([
                    'resnumber' => $transactionId,
                ]);
            })->pay()->render();
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
                'status' => 1,
            ]);
            $term = $res->walletable;
            $neworder = Order::updateOrCreate([
                //Add unique field combo to match here
                //For example, perhaps you only want one entry per user:
                'user_id' => $res->user_id,
                'term_id' => $term->id,
                'status' => 1,
            ], [
                'price' => $term->priceins($res->user),
                'resnumber' => $request->Authority,
                'description' => 'installments',
                'installments' => $res->installments,
                'agent' => $res->agent,
                'expire_support' => now()->addDays($term->sup_day / 2),

            ]);
            $result = $res->user->transactions()->create([
                'type' => 'debit',
                'amount' => $price,
                'status' => '1',
                'walletable_type' => get_class($neworder),
                'walletable_id' => $neworder->id,
                'description' => 'wallet',
                'parent' => $res->id,
            ]);
            if($res->installments==1)
            {
            event(new \App\Events\TermChannel($term, $res->user, $res));
            }
            $res->user->notify(new SendTermSuccess($term));
            $res->agents->notify(new SendAgentInstallment($res));
            event(new \App\Events\UserReferred(refcookie(), $res->user, $neworder, $res));
            alert()->success(' پرداخت شما موفقیت آمیز بود   ', 'پیغام سیستم')->persistent("تایید");
            return redirect(route('index'));
        } catch (InvalidPaymentException $exception) {
            /**
             * when payment is not verified, it will throw an exception.
             * We can catch the exception to handle invalid payments.
             * getMessage method, returns a suitable message that can be used in user interface.
             **/
            alert()->error($exception->getMessage())->persistent("تایید");
            return redirect(route('index'));
        }
    }
}
