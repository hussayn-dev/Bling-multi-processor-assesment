<?php


namespace HussDev\Assessment\Traits;

use HussDev\Assessment\Exceptions\InvalidCurrencyCode;
use League\ISO3166\ISO3166;

trait ValidateCurrency
{
    /**
     * Validate a list of currency codes.
     *
     * @param array $currencies
     * @return void
     */
    public function validateCurrencies(array $currencies): void
    {
        $iso3166 = new ISO3166();
        foreach ($currencies as $currency) {
            try {
                $iso3166->alpha2($currency);
            } catch (\Exception $e) {
                throw InvalidCurrencyCode::create($currency);
            }
        }
    }
}
