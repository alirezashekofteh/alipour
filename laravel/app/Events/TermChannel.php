<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TermChannel
{
    use SerializesModels;

    public $res;
    public $user;
    public $term;

    public function __construct($term, $user,$res)
    {
        $this->res = $res;
        $this->user = $user;
        $this->term=$term;
    }


    public function broadcastOn()
    {
        return [];
    }
}