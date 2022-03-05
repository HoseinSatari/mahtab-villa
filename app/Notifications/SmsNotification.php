<?php

namespace App\Notifications;

use App\Notifications\Melipayamak\MeliPayamak;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SmsNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $text;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($text)
    {
        $this->text = $text;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [MeliPayamak::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return [
            'text' => $this->text
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'text' => $this->text
        ];
    }
}
