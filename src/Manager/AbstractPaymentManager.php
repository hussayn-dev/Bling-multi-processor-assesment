<?php

namespace Bling\Assessment\Manager;

use Bling\Assessment\Contracts\PaymentContract;
use Bling\Assessment\Data\PaymentRequest;
use Bling\Assessment\Data\PaymentResponse;
use Bling\Assessment\Enums\PaymentStatus;
use Bling\Assessment\Models\PaymentAnalytics;

abstract class AbstractPaymentManager implements PaymentContract
{
    public PaymentContract|null $nextProvider = null;
    public int $providerId;

    /**
     * @param PaymentRequest $params
     * @param PaymentResponse $paymentResponse
     * @return PaymentResponse
     */
    public function handle(PaymentRequest $params, PaymentResponse $paymentResponse): PaymentResponse
    {
        $this->savePaymentAnalyticsLog(
            reference: $params->reference,
            providerId: $this->getProviderId(),
            status: $paymentResponse->status,
        );

        if ($paymentResponse->status->value != PaymentStatus::FAILED->value || !$this->nextProvider) {
            return $paymentResponse;
        }

        return $this->nextProvider->processPayment($params);
    }

    public function setNext(PaymentContract $paymentContract): void
    {
        $this->nextProvider = $paymentContract;
    }

    public function setProviderId(int $providerId): void
    {
        $this->providerId = $providerId;
    }

    public function getProviderId(): int
    {
        return $this->providerId;
    }

    protected function savePaymentAnalyticsLog(
        string        $reference,
        int           $providerId,
        PaymentStatus $status
    ): void
    {
        PaymentAnalytics::query()->create([
            'reference' => $reference,
            'processor_id' => $providerId,
            'is_transaction_approved' => $status->value == PaymentStatus::SUCCESS->value,
        ]);
    }
}
