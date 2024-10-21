<?php

namespace HussDev\Assessment\Enums;

enum PaymentStatus: string
{
    case PENDING = 'PENDING';
    case SUCCESS = 'SUCCESS';

    case FAILED = 'FAILED';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }
}
