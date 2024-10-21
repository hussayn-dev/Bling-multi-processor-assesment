<?php

namespace HussDev\Assessment\Traits;


use HussDev\Assessment\Models\Processor;

trait GetProcessor
{
    protected function getListOfProcessors(string $currency): array
    {
        $processors = Processor::query()
            ->where('is_active', true)
            ->where(function ($query) use ($currency) {
                $query->whereJsonContains('available_currency', $currency);
            })->get();

        return $processors->sort(function ($a, $b) {
            $scoreA = ($a->reliability_score * 2) - $a->transaction_cost;
            $scoreB = ($b->reliability_score * 2) - $b->transaction_cost;

            return $scoreB <=> $scoreA;
        })->toArray();
    }

    public function getProcessorClasses(array $processorNames): array
    {
        $processors = config("processor_config.processors");

        return array_map(function ($processor) use ($processors) {
            return [
                'id' => $processor->id,
                'className' => $processors[$processor->name]
            ];
        }, $processorNames);
    }


}