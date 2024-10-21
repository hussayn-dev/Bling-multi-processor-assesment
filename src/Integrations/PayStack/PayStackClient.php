<?php

namespace HussDev\Assessment\Integrations\PayStack;


class PayStackClient
{
    public function fundsTransfer(array $params): array
    {

        return [
            'status_code' => '00', // or other status codes like '0', '90', etc.
            'message' => 'PaymentAnalytics processed successfully',
            'transaction_id' => $response['data']['transaction_id'] ?? 'TX123456789',
        ];

    }
}
