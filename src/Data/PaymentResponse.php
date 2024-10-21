<?php

namespace Bling\Assessment\Data;

use Bling\Assessment\Enums\PaymentStatus;
use Spatie\LaravelData\Data;


class PaymentResponse extends Data
{
    public function __construct(
        public PaymentStatus $status,
        public string        $message,
        public bool          $success,
    )
    {
    }


}
