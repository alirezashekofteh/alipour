<?php

namespace App\Notifications;

use App\Notifications\Channels\KavenegarChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use \Morilog\Jalali\CalendarUtils;

class SendAgentInstallment extends Notification
{
    use Queueable;

    public $wallet;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($wallet)
    {
        $this->wallet = $wallet;
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
            'method' => 'ghest-pay',
            'token'=> $this->wallet->user->mobile,
            'token2'=>jdate()->format('Y-m-d'),
            'token3'=> $this->wallet->installments,
            'token5'=> $this->wallet->walletable->name,
            'number' => $notifiable->mobile
        ];
    }
}
