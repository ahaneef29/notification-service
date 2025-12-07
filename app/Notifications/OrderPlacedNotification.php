<?php

namespace App\Notifications;

use App\Models\PreferredChannelUser;
use App\Models\User;
use App\Notifications\Channels\SMSChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class OrderPlacedNotification extends Notification implements ShouldBeUnique
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        $notifiable->load('preferredChannelUsers');

        $channels = $notifiable->preferredChannelUsers()->get()->flatMap(function (PreferredChannelUser $preferredChannelUser) {
            return [$preferredChannelUser->preferredChannel->channel_name];
        })->toArray();

        Log::info('Channels:' . $notifiable->name . ":" . implode(',', $channels));

        //dd($channels);

        return $channels;
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        Log::info('Mail:' . $notifiable->name);
        return (new MailMessage)->markdown('mail.order-placed-notification');
    }

    public function toSMS(object $notifiable): string
    {
        return 'Your order has been placed successfully';
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
