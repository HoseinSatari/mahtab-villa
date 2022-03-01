<?php

namespace App\Listeners;

use App\Events\EndVilaEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Melipayamak\MelipayamakApi;

class EndSms
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
     * @param  EndVilaEvent  $event
     * @return void
     */
    public function handle(EndVilaEvent $event)
    {
        $username = '09120139630';
        $password = '1qaz!QAZ';
        $api = new MelipayamakApi($username,$password);
        $sms = $api->sms('soap');
        $to = $event->phone;
        $from = '50004001139630';
        $text =
            "درود ، امیدواریم از اقامت در خانه مهتاب نهایت لذت را برده باشید و بهترین خاطرات را ثبت کرده باشید. ".PHP_EOL.
            'بهترین باشید'.PHP_EOL.
            'تیم خانه مهتاب'.PHP_EOL.
            'www.mahtab-villa.ir'
        ;
        $isFlash = false;
        $sms->send($to,$from,$text,$isFlash);
    }
}
