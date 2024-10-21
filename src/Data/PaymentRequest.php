<?php

namespace Bling\Assessment\Data;

use Bling\Assessment\Enums\CurrencyEnum;
use Spatie\LaravelData\Data;

class PaymentRequest extends Data
{
    public function __construct(
        public string $account_number,
        public string $currency,
        public string $reference,
        public float  $amount,
    )
    {
    }
}
