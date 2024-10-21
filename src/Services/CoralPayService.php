<?php


namespace Bling\Assessment\Services;

use Bling\Assessment\Data\PaymentRequest;
use Bling\Assessment\Data\PaymentResponse;
use Bling\Assessment\Integrations\CoralPay\CoralPayClient;
use Bling\Assessment\Manager\AbstractPaymentManager;


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
