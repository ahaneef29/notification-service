<?php

namespace App\Notifications\Channels;

use Illuminate\Notifications\Notification;

class SMSChannel
{
    public function send(object $notifiable, Notification $notification):void
    {
        $message = $notifiable->toSMS($notification);
    }
}
