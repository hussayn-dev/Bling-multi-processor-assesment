<?php

namespace Bling\Assessment\Services;

use Bling\Assessment\Data\PaymentRequest;
use Bling\Assessment\Data\PaymentResponse;
use Bling\Assessment\Integrations\PayStack\PayStackClient;
use Bling\Assessment\Manager\AbstractPaymentManager;

class PaystackService extends AbstractPaymentManager
{

    protected int $providerId = 2;
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
