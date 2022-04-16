<?php

namespace App\Listeners;
use Illuminate\Support\Carbon;
class TermChannel
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
        $term = \App\Models\Term::find($event->term->id);
        $channels= $term->channel;
        if ($channels->count()) {
            foreach ($channels as $membertime) {
                $event->user->channels()->attach(
                    $membertime->channel_id,
                    [
                        'member' => $membertime->id,
                        'day' => $membertime->days,
                        'expire_at' => Carbon::now()->addDays($membertime->days),
                        'created_at' => Carbon::now(),
                        'wallet_id' => $event->res->id,
                        'description' => 'online-wallet-in-term',
                    ]
                );
            }
        }

    }
}
