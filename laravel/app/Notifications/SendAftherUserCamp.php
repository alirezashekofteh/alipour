<?php

namespace App\Notifications;

use App\Notifications\Channels\KavenegarChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendAftherUserCamp extends Notification
{
    use Queueable;

    public $phoneNumber;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
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
            'method' => "landing-crm",
            'token'=>$this->phoneNumber,
            'number' => $notifiable->mobile
        ];
    }
}
