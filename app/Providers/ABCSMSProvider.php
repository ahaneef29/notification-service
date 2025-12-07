<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;

class ABCSMSProvider
{
    public function send($message)
    {
       return Http::baseUrl(url())->fake('sms/v1/send', [
            'sender' => 'ABC',
            'message' => $message
        ]);
    }

    public function balance(): int
    {
        return 1000;
    }
}
