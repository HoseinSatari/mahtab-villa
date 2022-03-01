<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Events\TokenEvent' => [
            'App\Listeners\TokenSmsListener',
        ],
        'App\Events\Contact' => [
            'App\Listeners\ContactSendSms',
        ],
        'App\Events\StartVilaEvent' => [
            'App\Listeners\StartSms',
        ],
        'App\Events\EndVilaEvent' => [
            'App\Listeners\EndSms',
        ],
        'App\Events\StoreOrder' => [
            'App\Listeners\UserOrder',
            'App\Listeners\AdminStore',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
