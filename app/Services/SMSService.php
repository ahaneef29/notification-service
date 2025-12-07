<?php

namespace App\Services;

use App\Interfaces\SMSInterface;
use App\Providers\ABCSMSProvider;
use App\Providers\EtisalatSMSProvider;
use Illuminate\Support\Facades\Log;

class SMSService implements SMSInterface
{
    public function __construct(
        public EtisalatSMSProvider $etisalatSMSProvider,
        public ABCSMSProvider $ABCSMSProvider){
    }

    public function sendSMS($message): bool
    {
        // Send SMS to the user
        Log::info($message);
        return true;
    }

    public function getBalance(): int
    {
        return 50;
    }

    public function getSMSCount(): int
    {
        return 10;
    }

    public function isAvailable(): bool
    {
        return true;
    }
}
