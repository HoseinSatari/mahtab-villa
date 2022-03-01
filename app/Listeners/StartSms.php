<?php

namespace App\Listeners;

use App\Events\StartVilaEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Melipayamak\MelipayamakApi;

class StartSms
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
     * @param  StartVilaEvent  $event
     * @return void
     */
    public function handle(StartVilaEvent $event)
    {
        $username = '09120139630';
        $password = '1qaz!QAZ';
        $api = new MelipayamakApi($username,$password);
        $sms = $api->sms('soap');
        $to = $event->phone;
        $from = '50004001139630';
        $text =
            "درود ، سپاسگذاریم از انتخاب خانه مهتاب امیدواریم بهترین خاطرات را ثبت کنید. ".PHP_EOL.
            'این پیام جنبه یاداوری جهت تحویل ویلا در ساعت چهار بعد از ظهر را دارد.'.PHP_EOL.
            'تیم خانه مهتاب'.PHP_EOL.
            'www.mahtab-villa.ir'
        ;
        $isFlash = false;
        $sms->send($to,$from,$text,$isFlash);
    }
}
