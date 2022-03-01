<?php

namespace App\Listeners;

use App\Events\TokenEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Melipayamak\MelipayamakApi;

class TokenSmsListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  TokenEvent  $event
     * @return void
     */
    public function handle(TokenEvent $event)
    {
        $username = '09120139630';
        $password = '1qaz!QAZ';
        $api = new MelipayamakApi($username, $password);
        $smsSoap = $api->sms('soap');
        $to = $event->phone;
        $code = $event->code;
        $smsSoap->sendByBaseNumber($code, $to, '57322');
    }
}
