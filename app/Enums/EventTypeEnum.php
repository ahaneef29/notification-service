<?php

namespace App\Enums;

enum EventTypeEnum: string
{
    case OrderShipped = 'order_shipped';
    case OrderPlaced = 'order_placed';
    case PaymentFailed = 'payment_failed';

    public function label(): string
    {
        return match ($this) {
            self::OrderShipped => 'Order Shipped',
            self::OrderPlaced => 'Order Placed',
            self::PaymentFailed => 'Payment Failed',
        };
    }
}
