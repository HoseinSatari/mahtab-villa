<?php

namespace App\Listeners;

use App\Events\StoreOrder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Melipayamak\MelipayamakApi;

class UserOrder
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
     * @param  StoreOrder  $event
     * @return void
     */
    public function handle(StoreOrder $event)
    {
        $username = '09120139630';
        $password = '1qaz!QAZ';
        $api = new MelipayamakApi($username,$password);
        $sms = $api->sms('soap');
        $to = $event->userphone;
        $from = '50004001139630';
        $text =
            "سفارش شما ثبت شد ، امیدواریم از اقامت در خانه مهتاب نهایت لذت را ببرید".PHP_EOL.
            '  کد سفارش :'.$event->code.PHP_EOL.
            '  مبلغ :'.$event->price.PHP_EOL.
            ' تاریخ شروع :'.$event->start.PHP_EOL.
            '  تاریخ پایان :'.$event->end
        ;
        $isFlash = false;
        $sms->send($to,$from,$text,$isFlash);
    }
}
