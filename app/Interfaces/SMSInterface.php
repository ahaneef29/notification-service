<?php

namespace App\Interfaces;

interface SMSInterface
{
    public function sendSMS($message): bool;

    public function getBalance(): int;

    public function getSMSCount(): int;

    public function isAvailable(): bool;
}
