<?php

namespace App\Notifications\Channels;

use App\Interfaces\SMSInterface;
use Illuminate\Notifications\Notification;

class SMSChannel
{
    public function __construct(public SMSInterface $smsSvc)
    {
    }

    public function send(object $notifiable, Notification $notification): void
    {
        $message = $notification->toSMS($notifiable);

        $this->smsSvc->sendSMS($message);
    }
}
