<?php

namespace Bling\Assessment\Traits;


use Bling\Assessment\Models\Processor;
use Illuminate\Database\Eloquent\Collection;

trait GetProcessor
{
    protected function getListOfProcessors(string $currency): Collection
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
        });

    }


    public function getProcessorClasses(array $processorNames): array
    {
        $processors = config("processor_config.processors");

        // Filter the processor classes based on the given names
        return array_map(function ($name) use ($processors) {
            return $processors[$name] ?? null; // Return the class or null if not found
        }, $processorNames);
    }


}