<?php

namespace HussDev\Assessment\Integrations\Stripe;


class StripeClient
{
    public function fundPayment(array $params)
    {
        $responses = [
            [
                'status' => 'success',
                'message' => 'Transfer successful (stripe)',
                'transaction_id' => 'TX123456789',
            ],
            [
                'status' => 'failed',
                'message' => 'Transfer failed (stripe)',
                'transaction_id' => null,
            ]
        ];
        $pickedResponse = rand(0, 1);

        return $responses[$pickedResponse];
    }


}