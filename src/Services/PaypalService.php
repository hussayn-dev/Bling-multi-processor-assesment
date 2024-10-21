<?php

namespace Bling\Assessment\Services;

use Bling\Assessment\Data\PaymentRequest;
use Bling\Assessment\Data\PaymentResponse;
use Bling\Assessment\Integrations\PayPal\PayPalClient;
use Bling\Assessment\Manager\AbstractPaymentManager;

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
