<?php

namespace Bling\Assessment\Manager;

use Bling\Assessment\Models\Processor;
use Bling\Assessment\Traits\ValidateCurrency;
use Illuminate\Database\Eloquent\Collection;

class ProcessorManager
{
    use ValidateCurrency;

    /**
     * @param array{name: string, currency_available:array, transaction_cost: string} $params
     * @return Processor
     */
    public function register(array $params): Processor
    {
        $this->validateCurrencies([$params['currency_available']]);
        return Processor::query()->create($params);
    }

    public function update(Processor $processor, array $data): bool
    {
        return $processor->update($data);
    }

    public function delete(Processor $processor): bool
    {
        return $processor->delete();
    }

    public function getAllProcessors(): Collection
    {
        return Processor::query()->where('is_active', true)->get();
    }
}
