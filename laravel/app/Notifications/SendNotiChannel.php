<?php

namespace App\Notifications;

use App\Notifications\Channels\KavenegarChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use \Morilog\Jalali\CalendarUtils;

class SendNotiChannel extends Notification implements ShouldQueue
{
    use Queueable;
public $tries = 3;
    public $channel;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($channel)
    {
        $this->channel = $channel;
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
            'method' => 'Channel-notification',
            'token'=> jdate()->format('d-m-Y'),
            'token4'=>$this->channel->name,
            'number' => $notifiable->mobile
        ];
    }
}
