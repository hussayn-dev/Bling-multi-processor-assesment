<?php

namespace HussDev\Assessment\Services;

use HussDev\Assessment\Data\PaymentRequest;
use HussDev\Assessment\Data\PaymentResponse;
use HussDev\Assessment\Integrations\PayPal\PayPalClient;
use HussDev\Assessment\Manager\AbstractPaymentManager;

class PaypalService extends AbstractPaymentManager
{
    protected PayPalClient $paypalClient;


    public function __construct()
    {
        $this->paypalClient = resolve(PayPalClient::class);
    }

    /**
     * @param PaymentRequest $params
     * @return PaymentResponse
     */
    public function processPayment(PaymentRequest $params): PaymentResponse
    {
        $response = $this->paypalClient->processTransfer($params->toArray());

        return $this->handle(
            params: $params,
            paymentResponse: $response
        );
    }
}
