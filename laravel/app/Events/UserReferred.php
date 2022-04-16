<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserReferred
{
    use SerializesModels;

    public $referralId;
    public $user;
    public $order;
    public $wallet;

    public function __construct($referralId, $user,$order,$wallet)
    {
        $this->referralId = $referralId;
        $this->user = $user;
        $this->order=$order;
        $this->wallet=$wallet;
    }


    public function broadcastOn()
    {
        return [];
    }
}