<?php

namespace Bling\Assessment\Enums;

enum CurrencyEnum: string
{
    case NGN = 'NGN';
    case USD = 'USD';

    case GMD = 'GMD';

    public static function getCurrencies(): array
    {
        return array_column(self::cases(), 'value');
    }
}
