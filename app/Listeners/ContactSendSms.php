<?php

namespace App\Listeners;

use App\Events\Contact;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Melipayamak\MelipayamakApi;

class ContactSendSms
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Contact  $event
     * @return void
     */
    public function handle(Contact $event)
    {
        $username = '09120139630';
        $password = '1qaz!QAZ';
        $api = new MelipayamakApi($username,$password);
        $sms = $api->sms('soap');
        $to = $event->phone;
        $from = '50004001139630';
        $text =
            "موضوع :".$event->subject.PHP_EOL.
            '  متن پیام :'.$event->text.PHP_EOL.
            'سپاسگذاریم از پیام شما - تیم خانه مهتاب'.PHP_EOL.
            'www.mahtab-villa.ir'
        ;
        $isFlash = false;
        $sms->send($to,$from,$text,$isFlash);
    }
}
