<?php

namespace App\Notifications;

use App\Notifications\Channels\KavenegarChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use \Morilog\Jalali\CalendarUtils;

class SendTermSuccess extends Notification
{
    use Queueable;

    public $order;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($order )
    {
        $this->order = $order;
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
            'method' => $this->order->olgo,
            'token'=> jdate()->format('Y-m-d'),
            'token4'=>$this->order->name,
            'number' => $notifiable->mobile
        ];
    }
}
