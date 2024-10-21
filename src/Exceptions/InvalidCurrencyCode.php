<?php

namespace HussDev\Assessment\Exceptions;

use InvalidArgumentException;

class InvalidCurrencyCode extends InvalidArgumentException
{
    public static function create(string $code): InvalidCurrencyCode
    {
        return new static("The currency code `{$code}` provided is invalid.");
    }
}
