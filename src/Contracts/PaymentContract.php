<?php
declare(strict_types=1);

namespace Bling\Assessment\Contracts;

use HussDev\Assessment\Data\PaymentRequest;
use HussDev\Assessment\Data\PaymentResponse;

interface PaymentContract
{
    /**
     * @param PaymentRequest $params
     * @param PaymentResponse $paymentResponse
     * @return PaymentResponse
     */
    public function handle(PaymentRequest $params, PaymentResponse $paymentResponse): PaymentResponse;


    /**
     * @param PaymentRequest $params
     * @return PaymentResponse
     */
    public function processPayment(PaymentRequest $params): PaymentResponse;

    public function setNext(PaymentContract $paymentContract): void;

    public function setProviderId(int $providerId): void;

}
