<?php

namespace HussDev\Assessment\Data;

use Spatie\LaravelData\Data;

class PaymentAnalyticsData extends Data
{
    public function __construct(
        public int $provider_id,
        public bool $is_transaction_approved,
        public string $reference,
    )
    {
    }
}
