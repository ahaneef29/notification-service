<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;

class EtisalatSMSProvider
{
    public function send($message)
    {
       return Http::baseUrl(url())->fake('sms/v1/send', [
            'sender' => 'ETISALAT',
            'message' => $message
        ]);
    }

    public function balance(): int
    {
        return 0;
    }
}
