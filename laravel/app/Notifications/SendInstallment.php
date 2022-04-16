<?php

namespace App\Notifications;

use App\Notifications\Channels\KavenegarChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use \Morilog\Jalali\CalendarUtils;

class SendInstallment extends Notification
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
            'method' => 'ghest',
            'token'=> $notifiable->mobile,
            'token2'=>shorturlinstallment($this->wallet),
            'token3'=> $this->wallet->installments,
            'token4'=>$this->wallet->amount,
            'token5'=> $this->wallet->walletable->name,
            'number' => $notifiable->mobile
        ];
    }
}
