<?php

namespace App\Notifications;

use App\Notifications\Channels\KavenegarChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendRefSuccess extends Notification
{
    use Queueable;

    public $order;
    public $agent;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($order , $agent)
    {
        $this->order = $order;
        $this->agent = $agent;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [KavenegarChannel::class];
    }


    public function toKavenegarSms($notifiable)
    {
  
        return [
            'method' => "successfully-sale",
            'token'=>$notifiable->mobile,
            'token4'=>$this->order->name,
            'number' => $this->agent->mobile
        ];
    }
}
