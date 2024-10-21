<?php

namespace HussDev\Assessment\Data;

use HussDev\Assessment\Enums\CurrencyEnum;
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
