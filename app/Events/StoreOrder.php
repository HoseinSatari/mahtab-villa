<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StoreOrder
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
     public $userphone;
     public $price;
     public $start;
     public $end;
     public $code;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($userphone , $price  , $start , $end , $code )
    {
        $this->userphone = $userphone;
        $this->price = $price;
        $this->start = $start;
        $this->end = $end;
        $this->code = $code;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
