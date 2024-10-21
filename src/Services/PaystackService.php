<?php

namespace HussDev\Assessment\Services;

use HussDev\Assessment\Data\PaymentRequest;
use HussDev\Assessment\Data\PaymentResponse;
use HussDev\Assessment\Integrations\PayStack\PayStackClient;
use HussDev\Assessment\Manager\AbstractPaymentManager;

class PaystackService extends AbstractPaymentManager
{
    protected PaystackClient $paystackClient;

    public function __construct()
    {
        $this->paystackClient = resolve(PayStackClient::class);
    }


    /**
     * @param PaymentRequest $params
     * @return PaymentResponse
     */
    public function processPayment(PaymentRequest $params): PaymentResponse
    {
        $response = $this->paystackClient->fundsTransfer($params->toArray());

        return $this->handle(
            params: $params,
            paymentResponse: $response
        );
    }

}
