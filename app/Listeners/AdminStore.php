<?php

namespace App\Listeners;

use App\Events\StoreOrder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Melipayamak\MelipayamakApi;

class AdminStore
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
        $to = option()->phoneadmin;
        $from = '50004001139630';
        $text =
            "سفارش جدیدی در سایت ثبت شده".PHP_EOL.
            '  مبلغ :'.$event->price.PHP_EOL.
            ' تاریخ شروع :'.$event->start.PHP_EOL.
            '  تاریخ پایان :'.$event->end
        ;
        $isFlash = false;
        $sms->send($to,$from,$text,$isFlash);
    }
}
