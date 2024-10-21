<?php


namespace HussDev\Assessment\Services;

use HussDev\Assessment\Data\PaymentRequest;
use HussDev\Assessment\Data\PaymentResponse;
use HussDev\Assessment\Integrations\CoralPay\CoralPayClient;
use HussDev\Assessment\Manager\AbstractPaymentManager;


class CoralPayService extends AbstractPaymentManager
{
    protected CoralPayClient $coralPayClient;

    public function __construct()
    {
        $this->coralPayClient = resolve(CoralPayClient::class);
    }

    /**
     * @param PaymentRequest $params
     * @return PaymentResponse
     */
    public function processPayment(PaymentRequest $params): PaymentResponse
    {
        $response = $this->coralPayClient->processTransfer($params->toArray());
        return $this->handle(
            params: $params,
            paymentResponse: $response
        );
    }
}
