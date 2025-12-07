<?php

namespace App\Services;

use App\Interfaces\SMSInterface;
use Illuminate\Support\Facades\Log;

class SMSService implements SMSInterface
{
    public function sendSMS($message): bool
    {
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
