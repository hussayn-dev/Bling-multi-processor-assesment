<?php

namespace Bling\Assessment\Manager;

use Bling\Assessment\Contracts\PaymentContract;
use Bling\Assessment\Data\PaymentRequest;
use Bling\Assessment\Data\PaymentResponse;
use Bling\Assessment\Exceptions\PaymentServiceException;
use Bling\Assessment\Traits\GetProcessor;
use Bling\Assessment\Traits\ValidateCurrency;


class PaymentProcessor
{
    use GetProcessor, ValidateCurrency;

    /**
     * @throws PaymentServiceException
     */
    protected function connector($currency): PaymentContract
    {
        $this->validateCurrencies([$currency]);
        $processors = $this->getListOfProcessors($currency);
        $processors = $this->getProcessorClasses($processors);

        if (empty($processors)) {
            throw new PaymentServiceException('Processors not found');
        }

        $this->buildProviderChain($processors);

        return $processors[0];
    }

    /**
     * @param PaymentRequest $params
     * @return PaymentResponse
     * @throws PaymentServiceException
     */
    public function run(PaymentRequest $params): PaymentResponse
    {
        $connector = $this->connector($params->currency);

        return $connector->processPayment($params);
    }

    /**
     * @param array<int,PaymentContract> $providers
     * @return void
     * @throws PaymentServiceException
     */
    protected function buildProviderChain(array $providers): void
    {

        for ($i = 0; $i < (count($providers) - 1); $i++) {
            /** @var PaymentContract $providerClassName */
            $providerClassName = $providers[$i]['className'];
            $firstProviderId = $providers[$i]['id'];
            $nextProviderId = $providers[$i + 1]['id'];

            /** @var PaymentContract $providerClassName */
            $nextProviderClassName = $providers[$i + 1]['className'];

            if (!is_subclass_of($providerClassName, AbstractPaymentManager::class)) {
                throw new PaymentServiceException(
                    sprintf(
                        "Provider %s is not a subclass of %s",
                        get_class($providerClassName),
                        AbstractPaymentManager::class
                    ));
            }
            $providerClassName->setProviderId($firstProviderId);
            $nextProviderClassName->setProviderId($nextProviderId);
            $providerClassName->setNext($nextProviderClassName);
        }
    }
}
