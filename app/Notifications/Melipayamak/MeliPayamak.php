<?php


namespace App\Notifications\Melipayamak;


use Illuminate\Notifications\Notification;
use Melipayamak\MelipayamakApi;

class MeliPayamak
{
    public function send($notifiable, Notification $notification)
    {
        $username = '09120139630';
        $password = '1qaz!QAZ';
        $api = new MelipayamakApi($username,$password);
        $sms = $api->sms('soap');
        $to = $notifiable->phone;
        $from = '50004001139630';
        $text = $notification->text;
        $isFlash = false;
        $sms->send($to,$from,$text,$isFlash);
    }
}
