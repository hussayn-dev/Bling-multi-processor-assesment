<?php

namespace Bling\Assessment\Integrations\PayPal;

class PayPalClient
{

    public function processTransfer(array $params): array
    {
        return [
            'success' => true,
            'message' => 'PaymentAnalytics successful',
            'session_id' => "134444"
        ];


    }
}