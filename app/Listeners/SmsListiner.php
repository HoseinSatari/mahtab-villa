<?php

namespace App\Listeners;

use App\Events\SmsEvent;
use App\Notifications\SmsNotification;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SmsListiner
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
     * @param  SmsEvent  $event
     * @return void
     */
    public function handle(SmsEvent $event)
    {
        foreach (User::all() as $user) {
            $user->notify(new SmsNotification($event->text));
        }
    }
}
