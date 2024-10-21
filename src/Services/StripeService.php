<?php

namespace Bling\Assessment\Services;

use Bling\Assessment\Data\PaymentRequest;
use Bling\Assessment\Data\PaymentResponse;
use Bling\Assessment\Integrations\Stripe\StripeClient;
use Bling\Assessment\Manager\AbstractPaymentManager;

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
