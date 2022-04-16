<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Term;
use App\Models\Order;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment as ShetabitPayment;
use Illuminate\Support\Facades\Storage;


class TermController extends Controller
{
    public function showterm(Term $term)
    {

        $video = $term->video;
        $content=$term->termcontents()->get();
        return view('course.course', compact(['term', 'video','content']));
    }
    public function purchase(Term $term)
    {
        if (auth()->check()) {
            if (auth()->user()->allowWithdraw($term->price)) {
                $res = auth()->user()->transactions()->create([
                    'type' => 'debit',
                    'amount' => $term->price,
                    'status' => '1',
                ]);
                $order = auth()->user()->order()->create([
                    'resnumber' => $res->id,
                    'term_id' => $term->id,
                    'price' => $term->price,
                    'status' => 1,
                    'description'=>'wallet',
                ]);
                alert()->success(' پرداخت شما موفقیت آمیز بود   ', 'پیغام سیستم')->persistent("تایید");
                return redirect(route('panel.all'));
            } else {

                $invoice = (new Invoice)->amount($term->price);
                $order = auth()->user()->order()->create([
                    'term_id' => $term->id,
                    'price' => $term->price,
                    'description'=>'online',
                ]);

                return ShetabitPayment::callbackUrl(route('payment.callback'))->purchase($invoice, function ($driver, $transactionId) use ($term, $invoice, $order) {

                    $order->update([
                        'resnumber' => $transactionId,
                    ]);
                })->pay()->render();
            }
        } else {
            $test = $term->slug;
            session()->put('dataurl', $test);
            return redirect(route('register'));
        }
    }
    public function callback(Request $request)
    {
        try {
            $order = Order::where('resnumber', $request->Authority)->firstOrFail();
            $price = $order->term->price;

            // $payment->order->price
            $receipt = ShetabitPayment::amount($price)->transactionId($request->Authority)->verify();

            $order->update([
                'status' => 1
            ]);
            if($order->price==$order->term->Orginalprice())
            {
            auth()->user()->transactions()->create([
                'type' => 'credit',
                'amount' => $order->term->gift,
                'status' => '1',
            ]);
            }
            alert()->success(' پرداخت شما موفقیت آمیز بود   ', 'پیغام سیستم')->persistent("تایید");
            return redirect(route('panel.all'));
        } catch (InvalidPaymentException $exception) {
            /**
             * when payment is not verified, it will throw an exception.
             * We can catch the exception to handle invalid payments.
             * getMessage method, returns a suitable message that can be used in user interface.
             **/
            alert()->error($exception->getMessage())->persistent("تایید");
            return redirect(route('panel.all'));
        }
    }
}
