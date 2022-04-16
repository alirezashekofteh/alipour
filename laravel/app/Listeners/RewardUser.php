<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\SendRefSuccess;

class RewardUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $agent=User::find($event->referralId);

        // User who was sharing link
        $provider = $agent;
        $provider->transactions()->create([
            'type' => 'credit',
            'amount' => ($event->wallet->amount * $provider->percent) / 100,
            'status' => '1',
            'walletable_type' => get_class($event->wallet),
            'walletable_id' => $event->wallet->id,
            'description' => 'پورسانت خرید از سایت',
        ]);
        $event->wallet->agent=$event->referralId;
        $event->wallet->save();
        // User who used the link
       //  auth()->user()->notify(new SendRefSuccess($event->order->term,$agent));

    }
}
