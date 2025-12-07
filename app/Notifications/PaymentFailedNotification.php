<?php

namespace App\Notifications;

use App\Models\PreferredChannelUser;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class PaymentFailedNotification extends Notification
{
    public function __construct()
    {
    }

    public function via($notifiable): array
    {
        $notifiable->load('preferredChannelUsers');

        $channels = $notifiable->preferredChannelUsers()->get()->flatMap(function (PreferredChannelUser $preferredChannelUser) {
            return [$preferredChannelUser->preferredChannel->channel_name];
        })->toArray();

        Log::info('Channels:' . $notifiable->name . ":" . implode(',', $channels));

        //dd($channels);

        return $channels;
    }

    public function toMail($notifiable): MailMessage
    {
        Log::info('Mail:' . $notifiable->name);
        return (new MailMessage)->markdown('mail.payment-failed-notification');
    }

    public function toSMS(object $notifiable): string
    {
        return 'Your payment has failed. Please try again.';
    }

    public function toArray($notifiable): array
    {
        return [];
    }
}
