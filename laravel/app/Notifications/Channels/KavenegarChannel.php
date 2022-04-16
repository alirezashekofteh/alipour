<?php


namespace App\Notifications\Channels;


use Kavenegar\KavenegarApi;
use Kavenegar\Laravel\Message\KavenegarMessage;
use Kavenegar;
use Illuminate\Notifications\Notification;

class KavenegarChannel
{

    public function send($notifiable, $notification)
    {
        $data = $notification->toKavenegarSms($notifiable);
        $method = $data['method'];
        $number = $data['number'];
        if(isset($data['token']))
        {
            $token=$data['token'];
        }
        if(isset($data['token2']))
        {
            $token2=$data['token2'];
        }
        else
        {
            $token2='';
        }
        if(isset($data['token3']))
        {
            $token3=$data['token3'];
        }
        else
        {
            $token3='';
        }
        if(isset($data['token4']))
        {
            $token4=$data['token4'];
        }
        else
        {
            $token4='';
        }
        if(isset($data['token5']))
        {
            $token5=$data['token5'];
        }
        else
        {
            $token5='';
        }

        return Kavenegar::VerifyLookup($number,$method, $token, $token2, $token3,null,$token4,$token5);
    }
}
