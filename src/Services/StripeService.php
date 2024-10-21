<?php

namespace HussDev\Assessment\Services;

use HussDev\Assessment\Data\PaymentRequest;
use HussDev\Assessment\Data\PaymentResponse;
use HussDev\Assessment\Integrations\Stripe\StripeClient;
use HussDev\Assessment\Manager\AbstractPaymentManager;

class StripeService extends AbstractPaymentManager
{
    protected StripeClient $stripeClient;

    public function __construct()
    {
        $this->stripeClient = resolve(StripeClient::class);
    }

    /**
     * @param PaymentRequest $params
     * @return PaymentResponse
     */
    public function processPayment(PaymentRequest $params): PaymentResponse
    {
        $response = $this->stripeClient->fundPayment($params->toArray());

        return $this->handle(
            params: $params,
            paymentResponse: $response
        );
    }
}
